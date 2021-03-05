<?php
class Validate
{
	public function alpha(string $txt)
	{
		if (empty($txt)) return FALSE;
		return ctype_alpha($txt);
	}
	public function num(string $txt)
	{
		if (empty($txt)) return FALSE;
		return ctype_digit($txt);
	}
}
$ok = 0;
$valid = new Validate();
$name = $_POST['name'] ?? '';
$age  = $_POST['age'] ?? 0;
$msg  = [];
if ($valid->alpha($name)) {	
	$ok++;
	$msg[] = 'Name is validated';
} else {
	$msg[] = 'Name is NOT validated';
}
if ($valid->num($age)) {	
	$ok++;
	$msg[] = 'Age is validated';
} else {
	$msg[] = 'Age is NOT validated';
}
if ($ok === 2) {
	$msg[] = 'Everything validated successfully';
} else {
	$msg[] = 'Validation problem';
}

var_dump($msg);
