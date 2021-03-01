<?php
define('BASE_DIR', __DIR__);
spl_autoload_register(
	function ($class) {
		$fn = str_replace('\\', '/', $class) . '.php';
		require(BASE_DIR . '/src/' . $fn);
	}
);
use Demo\Math\Arithmetic;
$math = new Arithmetic();
$math->op1 = 33;
$math->op2 = 22;
echo $math->add();
echo "\n";
echo $math->sub();
echo "\n";
$whatever = new Arithmetic();
var_dump($math, $whatever);

