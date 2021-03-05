<?php
class Test {
    public function callIt(callable $callback, array $params) {
        return $callback($params);
    }
}
 
$operands[0] = 2;
$operands[1] = 3;
$callback = new class() {
	public function calc($p) {
       return 'The result of '
           . $p[0] . ' times ' . $p[1]
           . ' is ' . ($p[0] * $p[1]);
    }
	public function __invoke($p) {
		return $this->calc($p);
    }
};
$test = new Test;
// class that defines __invoke() is considered callable
echo $test->callIt($callback, $operands);
echo "\n";
// variation, same as above
echo $test->callIt([$callback, 'calc'], $operands);
