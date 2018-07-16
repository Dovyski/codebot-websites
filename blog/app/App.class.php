<?php
require_once(dirname(__FILE__) . '/3rdparty/parsedown/Parsedown.php');

class App {
	private $mDataPath;
	private $mConfig;
	private $mItem;
	private $mRender;
	private static $mData;

	public static function get($theKey) {
		return isset(self::$mData['item'][$theKey]) ? self::$mData['item'][$theKey] : '***UNDEFINED***';
	}

	public static function posts() {
		return self::$mData['posts'];
	}

	public static function config($theKey) {
		$aParts = explode('.', $theKey);
		$aEntry = self::$mData['config'];

		foreach($aParts as $aKey) {
			if(!isset($aEntry[$aKey])) {
				exit('Unknown config entry: "' . $theKey . '"');
			}

			$aEntry = $aEntry[$aKey];
		}

		return $aEntry;
	}

	function __construct() {
		$aPathConfigFile = dirname(__FILE__) . '/../site.ini';

		$this->mConfig = @parse_ini_file($aPathConfigFile, true);
		$this->mDataPath = dirname(__FILE__) . '/../data/';
		$this->mRender = new Parsedown();
	}

	private function process404() {
		echo '404 - Not found';
	}

	private function render() {
		$aLayout = isset($this->mItem['layout']) ? $this->mItem['layout'] : 'post';
		$aLayoutPath = dirname(__FILE__) . '/../layouts/' . $aLayout . '.php';

		if(!file_exists($aLayoutPath)) {
			exit('Unknown layout: ' . $aLayoutPath);
		}

		require_once($aLayoutPath);
	}

	private function loadItem($theItemPath) {
		$aRawMeta = '';
		$aRawContent = '';
		$aIsCollectingMeta = false;

		if(!$this->isEntryPathValid($theItemPath) || !file_exists($theItemPath)) {
			return null;
		}

		foreach (new SplFileObject($theItemPath) as $aLine) {
			if(empty(trim($aLine))) {
				continue;
			}

			if($aIsCollectingMeta) {
				if(trim($aLine) == '---') {
					$aIsCollectingMeta = false;
				} else {
					$aRawMeta .= $aLine;
				}
				continue;
			}

			if(trim($aLine) == '---') {
				$aIsCollectingMeta = true;
				continue;
			}

			$aRawContent .= $aLine;
		}

		$aRet = array('content' => $aRawContent, 'meta' => $aRawMeta);
		return $aRet;
	}

	private function parseItem($theItemPath) {
		$aRaw = $this->loadItem($theItemPath);

		if($aRaw == null) {
			return null;
		}

		$aItem = $this->parseMetaData($aRaw['meta'], $theItemPath);
		$aItem['content'] = $this->parseRawContent($aRaw['content']);
		$aItem['excerpt'] = substr(strip_tags($aItem['content']), 0, 110);
		$aItem['path'] = realpath($theItemPath);

		return $aItem;
	}

	private function parseRawContent($theRawContent) {
		$aHtml = '';
		$aParts = explode("\n", $theRawContent);
		foreach($aParts as $aLine) {
			$aHtml .= $this->mRender->text($aLine);
		}

		// Add emojis
		$aHtml = str_replace(':)', '<img src="'.$this->mConfig['site']['base_url'].'/img/icons/smile-o.svg" class="emoji" title="Smile" />', $aHtml);

		return $aHtml;
	}

	public function getAuthorById($theId) {
		$theId = $theId + 0;
		$aAuthorsFile = $this->getAuthorsDirPath() . $theId . '.ini';

		$aRet = array(
			'id' => $theId,
			'name' => 'Unknown (id='.$theId.')',
			'email' => '',
			'bio' => ''
		);

		if(file_exists($aAuthorsFile)) {
			$aIni = parse_ini_file($aAuthorsFile);
			$aRet = array_merge($aRet, $aIni);
		}

		$aRet['gravatar_hash'] = md5(trim($aRet['email']));
		return $aRet;
	}

	public function parseMetaData($theRawMeta, $theItemPath) {
		$aFileName = basename($theItemPath);
		$aMeta = parse_ini_string($theRawMeta, true);

		if(!isset($aMeta['date'])) {
			$aParts = explode('-', $aFileName);

			if(count($aParts) >= 4) {
				$aMeta['date'] = $aParts[0] . '-' . $aParts[1] . '-' . $aParts[2];
			} else {
				$aMeta['date'] = date('Y-m-d', filemtime($theItemPath));
			}
		}

		$aAuthorId = isset($aMeta['author']) ? $aMeta['author'] : '';
		$aMeta['author'] = $this->getAuthorById($aAuthorId);

		return $aMeta;
	}

	public function run($theRequest) {
		// Make some data available for rendering
		self::$mData = array(
			'posts' => $this->findPosts(true),
			'config' => $this->mConfig
		);

		$aId = isset($theRequest['item']) ? basename($theRequest['item']) : 'index';
		$this->mItem = $this->getEntryById($aId);

		if($this->mItem == null) {
			$this->process404();
			return;
		}

		self::$mData['item'] = $this->mItem;
		$this->render();
	}

	public function getEntriesDirPath() {
		return $this->mDataPath . 'entries/';
	}

	public function getAuthorsDirPath() {
		return $this->mDataPath . 'authors/';
	}

	public function isEntryPathValid($theEntryPath) {
		static $aEntries;

		if($aEntries == null) {
			$aEntries = $this->findEntries();
		}

		$aId = $this->extracEntryIdFromPath($theEntryPath);
		$aValidEntries = array_keys($aEntries);

		return in_array($aId, $aValidEntries);
	}

	public function getEntryById($theId) {
		$aItemPath = $this->getEntriesDirPath() . $theId . '.md';
		return $this->parseItem($aItemPath);
	}

	public function findPosts($theWithData = false) {
		return $this->findEntries($theWithData, '[0-9]*.md');
	}

	public function extracEntryIdFromPath($theEntryPath) {
		return substr(basename($theEntryPath), 0, -3);
	}

	public function findEntries($theWithData = false, $thePattern = '*.md') {
		$aRet = array();
		$aEntries = glob($this->getEntriesDirPath() . $thePattern, GLOB_NOSORT);

		foreach($aEntries as $aEntryPath) {
			$aId = $this->extracEntryIdFromPath($aEntryPath);

			if($theWithData) {
				$aRet[$aId] = $this->getEntryById($aId);
			}

			$aRet[$aId]['path'] = realpath($aEntryPath);
		}

		return array_reverse($aRet);
	}
}


?>
