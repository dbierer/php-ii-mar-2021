<?php
namespace Demo\Whatever;
use Demo\Special\Sonia;
use Demo\Something\Elsa;
class Fred
{
	public $sonia = NULL;
	public $elsa  = NULL;
	public function __construct()
	{
		$this->sonia = new Sonia();
		$this->elsa  = new Elsa();
	}
}
