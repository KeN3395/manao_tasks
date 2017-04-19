<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>parsing from onliner2</title>
</head>
<body>
<?php
if (file_exists('onliner.xml')) {
    $xmlfile = file_get_contents("onliner.xml");
    $xml = new SimpleXMLElement($xmlfile);
    $i = 0;
    foreach ($xml->item as $item) {
        $i++;
        copy($item->thumbnail, 'images/' . $i . '.jpg');
        $item->thumbnail = '/images/' . $i . '.jpg';
    }
    $xml->saveXML('result.xml');
    echo '<pre>' . print_r($xml, true) . '</pre>';
} else {
    exit('Не удалось открыть файл onliner.xml.');
}

?>
</body>
</html>