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
	public function __serialize()
	{	
		return ['sleepDate' => new DateTime(), 'id' => $this->id, 'name' => $this->name ];
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
		
