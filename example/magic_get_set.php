<?php
class User
{
	const ERR_VAR_SET = 'Attempt to assign value to non-existent var %s';
	const ERR_VAR_GET = 'Attempt to retrieve non-existent var %s';
	public $id = 0;
	public $name = '';
	protected $password = '';
	public function setPass(string $password)
	{
		$this->password = password_hash($password, PASSWORD_BCRYPT);
	}
	public function __set($name, $val)
	{
		throw new Exception(sprintf(self::ERR_VAR_SET, $name));
	}
	public function __get($name)
	{
		error_log(sprintf(self::ERR_VAR_GET, $name));
		return NULL;
	}
	public function __toString()
	{
		return var_export($this, TRUE);
	}
	// only $id and $name are placed in the serialization
	public function __sleep()
	{
		return ['id','name'];
	}
}
$test = new User();
$test->id = 123;
$test->name = 'Zend';
$test->setPass('super secret password');
echo $test->doesntExist;
try {
	$test->not = 'NOT';
} catch (Exception $e) {
	echo $e;
}
echo "\n";
echo $test;
$str = serialize($test);
echo "\n";
echo $str;
echo "\n";
		
