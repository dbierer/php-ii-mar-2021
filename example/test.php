<?php
$date = new DateTime(); // today's date
for ($x = 30; $x < 100; $x += 30) {
    $day[$x] = clone $date;
    $day[$x]->add(new DateInterval('P' . $x . 'D'));
    echo '<br>' . $day[$x]->format('Y-m-d') . PHP_EOL;
}
var_dump($day);	
// outputs:
/*
<br>2017-11-02
	
<br>2018-01-01
	
<br>2018-04-01
*/
