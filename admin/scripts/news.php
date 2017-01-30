<?php

$url = "http://g1.globo.com/dynamo/economia/rss2.xml";
$xml = simplexml_load_file($url);
echo json_encode($xml->channel);

?>