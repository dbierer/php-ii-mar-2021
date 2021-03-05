<?php
class Test
{
	public function dump(mixed $data) : string
	{
		return var_export($data, TRUE);
	}
	public function looper(iterable $iter) : string
	{
		$output = '';
		foreach ($iter as $item)
			$output .= $item;
		return $output;
	}
}
$test = new Test;
$iter = new ArrayIterator(range('A','F'));
echo $test->dump($iter);
echo "\n";
echo $test->looper($iter);
echo "\n";
echo $test->looper(['A','B','C','D','E','F','G']);
echo "\n";
echo $test->looper('ABCDEFGHI');
echo "\n";
