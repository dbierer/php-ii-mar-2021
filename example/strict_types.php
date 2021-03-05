<?php
// if you do not declare strict_types=1, 
// the scalar (int,float,string,bool) type hints act as a form type casting
declare(strict_types=1);
class Topic1 {
    protected $title, $subTitle, $status, $bullets;
    // nullable type: PHP 7.4 and above
    public function __construct(string $title, 
							    ?string $subTitle, 
							    int $status, 
							    array $bullets) {
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

