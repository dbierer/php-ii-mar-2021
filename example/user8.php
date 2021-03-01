<?php
define('BASE_DIR', __DIR__);
spl_autoload_register(
	function ($class) {
		// NOTE: adding class_exists() might save some time
		if (!class_exists($class)) {
			$fn = str_replace('\\', '/', $class) . '.php';
			require(BASE_DIR . '/src/' . $fn);
		}
	}
);
use Demo\Entity\UserPhp8;
$user[] = new UserPhp8('Jack' , 'Ryan');	
$user[] = new UserPhp8('Monte' , 'Python');
var_dump($user);
echo "\n";
var_dump(get_class_vars(UserPhp8::class));
