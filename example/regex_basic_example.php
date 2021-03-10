<?php
$data = [
	'Table.php',
	'Table22.php',
	'SomeTableWhatever.php',
	'<p>Para 1</p><p>Para 2</p>',
	'<a href="https://zend.com">Zend</a>',
	"<a href='https://zend.com'>Zend</a>"
];
$patterns = [
	'/Table.*\.php/',
	'/<p>(.*?)<\/p>/',
	'/<a.*?href=("|\')(.*?)("|\').*?>/'
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
