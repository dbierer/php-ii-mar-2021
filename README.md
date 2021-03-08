# php-ii-mar-2021

## Homework
* For 8 Mar 2021
  * Lab: Interfaces
  * Lab: Type Hinting
  * Lab: Build Custom Exception Class
  * Lab: Traits
  * Lab: Review the OrderApp and come back Monday with questions (if any)
* For 5 Mar 2021
  * Lab: Create an Extensible Super Class
  * Lab: Magic Methods
  * Lab: Abstract Classes (do it with the Super Class lab)
* For 3 Mar 2021
  * Update the VM (see instructions below)
  * Lab: Namespace
  * Lab: Create a Class
## Class Notes
* Composer 
  * https://getcomposer.org/
  * https://packagist.org/
* PHPStan
  * https://phpstan.org/
  * Tool to find bugs or incompatibilities without having to write tests
* Please note re: `__toString()` Exceptions
  * You can throw an Exception in `__toString()` *only* in PHP 8
## VM Updates
* Update the OS
  * Bring up the VM and login (user: vagrant, pwd: vagrant)
  * Open a terminal window
  * Install `git`
```
sudo apt install -y git
```
  * Change to the `/home/vagrant` directory
```
cd
```
  * Clone this repo:
```
git clone https://github.com/dbierer/php-ii-mar-2021.git
```
  * Change to the new directory just cloned:
```
cd php-ii-mar-2021
```
  * Run the copy script as root:
```
chmod +x ./update.sh
sudo ./update.sh
```

## Resources
* Article on Late Static Binding: https://www.php.net/manual/en/language.oop5.late-static-bindings.php

## Q & A
* Q: What vers of PHP introduced return data types? (7???)
* A: PHP 7.0
* A: See: https://www.php.net/manual/en/language.types.declarations.php

* Q: When were nullable types introduced?
* A: PHP 7.1.  See: https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.nullable

* Q: Locate example that uses `__call()` to implement "plugins"
* A: `Laminas\Mvc\Controller\AbstractController::__call()`
* A: See: https://github.com/laminas/laminas-mvc/blob/4.0.x/src/Controller/AbstractController.php

* Q: Add reference to other magic method examples from "classic PHP repo"
* A: OOP examples: https://github.com/dbierer/classic_php_examples/tree/master/oop

## TODO
