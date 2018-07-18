<?php

require_once(dirname(__FILE__) . '/../../app/App.class.php');

$aApp = new App();
$aPosts = $aApp->findPosts(true);
$aSiteURL = 'https://blog.codebot.cc';
$aFeedURL = $aSiteURL . '/feed/';

header('Content-Type: application/rss+xml; charset=ISO-8859-1');

echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
echo '<channel>';
echo '<atom:link href="' . $aFeedURL . '" rel="self" type="application/rss+xml" />';
echo '<title>Codebot blog</title>';
echo '<link>'.$aSiteURL.'</link>';
echo '<description>Codebot is a gamedev IDE on the cloud</description>';
echo '<language>en-us</language>';
echo '<copyright>Copyright (C) '.date('Y').' blog.codebot.cc</copyright>';

foreach($aPosts as $aPost) {
    echo '<item>';
        $aPermaLink = $aSiteURL . '/' . substr(basename($aPost['path']), 0, -3);
        echo '<title>' . $aPost['title'] . '</title>';
        echo '<description><![CDATA[' . substr($aPost['content'], 0, 400) . ']]></description>';
        echo '<link>' . $aPermaLink . '</link>';
        echo '<pubDate>' . date("D, d M Y H:i:s O", strtotime($aPost['date'])) . '</pubDate>';
        echo '<guid isPermaLink="true">' . $aPermaLink . '</guid>';
    echo '</item>';
}

echo '</channel>';
echo '</rss>';

?>
