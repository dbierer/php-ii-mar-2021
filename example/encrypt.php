<?php
define('BASE_DIR', __DIR__);
spl_autoload_register(
	function ($class) {
		$fn = str_replace('\\', '/', $class) . '.php';
		require(BASE_DIR . '/src/' . $fn);
	}
);
use Demo\Encrypt\OpenSsl;
$open = new OpenSsl('password');
echo $open->cipher;
