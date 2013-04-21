<?php

$pandora_username = $_GET['pandora_username'];

$url = 'http://www.pandora.com/content/stations?startIndex=0&webname=' . urlencode($pandora_username) . '&cachebuster=' . time();

$c = curl_init($url);
curl_setopt($c, CURLOPT_COOKIE, 'at=' . $_GET['pandora_at_cookie']);
curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($c);
curl_close($c);

preg_match_all('@href="(?<station_url>/station/[0-9]+)">(?<station_name>.*)<@', $html, $matches);

$stations = array_combine($matches['station_url'], $matches['station_name']);

header('Content-Type: application/json');
echo json_encode($stations);
