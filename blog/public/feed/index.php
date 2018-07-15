<?php

require_once(dirname(__FILE__) . '/../../app/App.class.php');

$aApp = new App();
$aPosts = $aApp->findPosts(true);

header('Content-Type: application/rss+xml; charset=ISO-8859-1');

echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo '<rss version="2.0">';
echo '<channel>';
echo '<title>My RSS feed</title>';
echo '<link>http://www.mywebsite.com</link>';
echo '<description>This is an example RSS feed</description>';
echo '<language>en-us</language>';
echo '<copyright>Copyright (C) 2009 mywebsite.com</copyright>';

foreach($aPosts as $aPost) {
    echo '<item>';
        echo '<title>' . $aPost['title'] . '</title>';
        echo '<description>' . substr($aPost['content'], 0, 400) . '</description>';
        echo '<link></link>';
        echo '<pubDate>' . date("D, d M Y H:i:s O", strtotime($aPost['date'])) . '</pubDate>';
    echo '</item>';
}

echo '</channel>';
echo '</rss>';

?>
