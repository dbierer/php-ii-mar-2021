<?php
$test = 'To this,ha ha,I say tally ho. Ta ta. "Ha hah"';
	
$words = array();
	
// This does not work:
	
// $words = explode(' ', $test);
	
 
	
// Try this instead:
	
preg_match_all('/\w+?\b/', $test, $words);
	
var_dump($words);
	
 
	
// this also works:
	
$words = preg_split('/[^\w]/i', $test, 0, PREG_SPLIT_NO_EMPTY);
	
var_dump($words);
