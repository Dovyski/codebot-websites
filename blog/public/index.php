<?php

require_once(dirname(__FILE__) . '/../app/App.class.php');

$aPathDataDir = dirname(__FILE__) . '/../data/';
$aPathConfigFile = dirname(__FILE__) . '/../site.ini';

$aConfig = @parse_ini_file($aPathConfigFile, true);

$aApp = new App($aConfig, $aPathDataDir);
$aApp->run($_REQUEST);

?>
