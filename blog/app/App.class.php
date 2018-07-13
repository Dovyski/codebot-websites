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

	function __construct($theConfig, $theDataPath) {
		$this->mConfig = $theConfig;
		$this->mDataPath = $theDataPath;
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

		$aHtml = $this->mRender->text($this->mItem['content']);
		$this->renderContentUsingLayout($aHtml, $this->mItem['meta'], $aLayout);
	}

	private function renderContentUsingLayout($theContent, $theMeta, $theLayout) {
		$aLayoutPath = dirname(__FILE__) . '/../layouts/' . $theLayout . '.php';

		if(!file_exists($aLayoutPath)) {
			exit('Unknown layout: ' . $aLayoutPath);
		}

		self::$mData = array(
			'item' => array_merge($theMeta, array('content' => $theContent)),
			'config' => $this->mConfig
		);
		require_once($aLayoutPath);
	}

	private function parseItem($theItemPath) {
		$aRawMeta = '';
		$aRawContent = '';
		$aIsCollectingMeta = false;

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

		return array('content' => $aRawContent, 'meta' => parse_ini_string($aRawMeta, true));
	}

	public function run($theRequest) {
		$aItem = isset($theRequest['item']) ? basename(realpath($theRequest['item'])) : 'index';
		$aItemPath = $this->mDataPath . 'entries/' . $aItem . '.md';

		if(!file_exists($aItemPath)) {
		    $this->process404();
			return;
		}

		$this->mItem = $this->parseItem($aItemPath);
		$this->render();
	}
}


?>
