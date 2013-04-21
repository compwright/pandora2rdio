<?php

$pandora_username = $_GET['pandora_station_url'];

$url = 'http://www.pandora.com' . $pandora_username;

$c = curl_init($url);
curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($c);
curl_close($c);

die($html);
