<?php
class Test
{
	public function getAlphaNum()
	{
		$class = new class() {
			public array $alpha;
			public array $num;
			public function __construct()
			{
				$this->alpha = range('A','Z');
				$this->num   = range(0,9);
			}
		};
		return $class;
	}
}
$test = new Test();
var_dump($test->getAlphaNum());

		
