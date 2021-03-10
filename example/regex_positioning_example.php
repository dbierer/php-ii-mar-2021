<?php
$data = [
	'22Something',
	'ABC',
	'smiley.jpg',
	'cool_graphic.png',
	'ERROR_REPORTING',
	"This file contains an 'ERROR' someplace."
];
$patterns = [
	'/^[A-Z].*/',
	'/.*(jpg|png)$/',
	'/\bERROR\b/'
];
foreach ($patterns as $pattern) {
	echo "Testing " . $pattern . "\n";
	foreach ($data as $item) {
		echo $item . "\n";
		if (preg_match($pattern, $item, $matches)) {
			echo 'Match found: ' . var_export($matches, TRUE);
		} else {
			echo 'No Match';
		}
		echo "\n";
	}
}

