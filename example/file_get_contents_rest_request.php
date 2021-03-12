<?php
// Make a request for JSON	
$url = 'https://api.unlikelysource.com/api?city=Lincoln&country=GB';
$response = file_get_contents($url);
var_dump(json_decode($response));
