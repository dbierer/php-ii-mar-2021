<?php
class Topic1 {
    protected $title, $subTitle, $status, $bullets;
    // nullable type: PHP 7.4 and above
    public function __construct(string $title, ?string $subTitle, int $status, array $bullets) {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->status = $status;
        $this->bullets = $bullets;
    }
}
class Topic2 {
    protected $title, $subTitle, $status, $bullets;
    // union type syntax: PHP 8 and above
    public function __construct(string $title, null|string $subTitle, int|float|string $status array $bullets) {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->status = $status;
        $this->bullets = $bullets;
    }
}

$topic1 = new Topic1('Nullable Type', NULL, ['A','B','C']);
var_dump($topic1);
echo "\n";

$topic2 = new Topic2('Union Type', NULL, ['A','B','C']);
var_dump($topic2);
echo "\n";
