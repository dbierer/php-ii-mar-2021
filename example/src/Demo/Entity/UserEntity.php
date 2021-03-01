<?php
namespace Demo\Entity;
class UserEntity 
{	
    protected string $firstName;	
    protected string $lastName;
    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName ;
        $this->lastName = $lastName ;
    }
    public function getArray()
    {
		return get_object_vars($this);
	}
}
