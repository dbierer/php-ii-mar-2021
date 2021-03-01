<?php
define('BASE_DIR', __DIR__);
spl_autoload_register(
	function ($class) {
		$fn = str_replace('\\', '/', $class) . '.php';
		require(BASE_DIR . '/src/' . $fn);
	}
);
use Demo\Entity\UserEntity;
$user[] = new UserEntity('Jack' , 'Ryan');	
$user[] = new UserEntity('Monte' , 'Python');
var_dump($user);
echo "\n";
$test = new UserEntity('James' , 'Bond');
var_dump($test->getArray());
echo "\n";
var_dump(get_class_vars(UserEntity::class));
