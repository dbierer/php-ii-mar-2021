<?php
// applies to both property data types and a
// parameter data types:
declare(strict_types=1);
class Topic1 {
    protected string $title;
    protected string|null $subTitle;
    protected int $status;
    protected array $bullets;
    // nullable type: PHP 7.4 and above
    public function __construct($title, $subTitle, $status, $bullets) {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->status = $status;
        $this->bullets = $bullets;
    }
}

$topic1 = new Topic1('Nullable Type', 
					 12345, 
					 99, 
					 ['A','B','C']);
var_dump($topic1);
echo "\n";

