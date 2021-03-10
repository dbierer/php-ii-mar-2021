<?php
include __DIR__ . '/vendor/autoload.php';
use Demo\Test;
$test = new Test(999, 'Fred Flintstone');
var_dump($test);
