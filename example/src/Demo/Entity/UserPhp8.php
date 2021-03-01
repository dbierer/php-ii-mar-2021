<?php
namespace Demo\Entity;
class UserPhp8
{	
	// this demonstrates Constructor Property Promotion
	// ONLY available in PHP 8 and above!
	// NOTE: the default value is optional
    public function __construct(
		public string $firstName = '', 
		public string $lastName  = '') 
    {}
}
