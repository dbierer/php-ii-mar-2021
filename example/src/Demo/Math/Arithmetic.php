<?php
namespace Demo\Math;

class Arithmetic
{
	public $op1 = 0;
	public $op2 = 0;
	public function add()
	{
		return $this->op1 + $this->op2;
	}
	public function sub()
	{
		return $this->op1 - $this->op2;
	}
}
