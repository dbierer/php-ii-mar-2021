<?php
// Make a request for JSON	
$url = 'https://api.unlikelysource.com/api?city=Catoira&country=ES';

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
$result = curl_exec($ch);

var_dump($result);
var_dump(curl_getinfo($ch));

// close cURL resource, and free up system resources
curl_close($ch);

