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
		$aLayout = 'post';

		if(isset($this->mItem['meta']['layout'])) {
			$aLayout = $this->mItem['meta']['layout'];
		}

		$aHtml = '';
		$aParts = explode("\n", $this->mItem['content']);
		foreach($aParts as $aLine) {
			$aHtml .= $this->mRender->text($aLine);
		}

		$this->renderContentUsingLayout($aHtml, $this->mItem['meta'], $aLayout);
	}

	private function renderContentUsingLayout($theContent, $theMeta, $theLayout) {
		$aLayoutPath = dirname(__FILE__) . '/../layouts/' . $theLayout . '.php';

		if(!file_exists($aLayoutPath)) {
			exit('Unknown layout: ' . $aLayoutPath);
		}

		self::$mData = array(
			'posts' => $this->findPosts(true),
			'item' => array_merge($theMeta, array('content' => $theContent)),
			'config' => $this->mConfig
		);
		require_once($aLayoutPath);
	}

	private function parseItem($theItemPath) {
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

		$aMeta = $this->parseMetaData($aRawMeta, $theItemPath);
		return array('content' => $aRawContent, 'meta' => $aMeta);
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
		$aId = isset($theRequest['item']) ? basename($theRequest['item']) : 'index';
		$aItem = $this->getEntryById($aId);

		if($aItem == null) {
			$this->process404();
			return;
		}

		$this->mItem = $aItem;
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
		$aEntries = glob($this->getEntriesDirPath() . $thePattern);

		foreach($aEntries as $aEntryPath) {
			$aId = $this->extracEntryIdFromPath($aEntryPath);

			if($theWithData) {
				$aEntry = $this->getEntryById($aId);
				$aRet[$aId] = $aEntry['meta'];
				$aRet[$aId]['content'] = $aEntry['content'];
			}

			$aRet[$aId]['path'] = realpath($aEntryPath);
		}

		return $aRet;
	}
}


?>
