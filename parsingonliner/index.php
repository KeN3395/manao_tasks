<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>parsing from onliner</title>
</head>
<body>
<?php
function deleteSpecialSymbols($str)
{
    $str = str_replace("Читать далее…", '', strip_tags($str));
    $str = preg_replace("[&nbsp;]", " ", $str);
    return $str;
}
$rss = simplexml_load_file('https://auto.onliner.by/feed');
$content = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<news>\n";
for ($i = 0; $i <= 10; $i++) {
    $item = $rss->channel->item[$i];
    $link = "\n\t\t<link>".deleteSpecialSymbols($item->link)."</link>";
    $title = "\n\t\t<title>".deleteSpecialSymbols($item->title)."</title>";
    $pubDate = "\n\t\t<pubDate>".deleteSpecialSymbols($item->pubDate)."</pubDate>";
    $description = "\n\t\t<description>".deleteSpecialSymbols($item->description)."</description>";
    $findNameSpaces = $rss->getNamespaces(true);
    $findChild = $item->children($findNameSpaces["media"]);
    $thumbnail = "\n\t\t<thumbnail>".deleteSpecialSymbols($findChild->thumbnail[0]->attributes())."</thumbnail>";
    $content .= "\t<item>".$link.$title.$pubDate.$description.$thumbnail."\n\t</item>\n";
}
$content.="</news>";
echo '<pre>' . print_r($content, true) . '</pre>';
file_put_contents('onliner.xml',$content,FILE_TEXT);
?>
</body>
</html>