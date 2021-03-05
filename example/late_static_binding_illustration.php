<?php
// for more info: https://www.php.net/manual/en/language.oop5.late-static-bindings.php
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
		// "self" binds to the earlier version of "who()"
		self::who();
		// "static" binds to the later version of "who()"
        static::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();
