<?php

require_once(dirname(__FILE__) . '/../../app/App.class.php');

$aApp = new App();
$aPosts = $aApp->findPosts(true);

foreach($aPosts as $aId => $aPost) {
    echo $aPost['title'] . '<br>';
}

?>
