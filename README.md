# php-ii-mar-2021

## Homework
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

## TODO
* Finish the OpenSsl `encrypt()`
* Locate example that uses `__call()` to implements "plugins"
* Add reference to other magic method examples from "classic PHP repo"
* Error in CustomersModel
```
( ! ) Fatal error: Uncaught TypeError: OrderApp\Model\CustomersModel::getCustomer(): Return value must be of type array, bool returned in /home/vagrant/Zend/workspaces/DefaultWorkspace/orderapp/src/OrderApp/Model/CustomersModel.php on line 32
( ! ) TypeError: OrderApp\Model\CustomersModel::getCustomer(): Return value must be of type array, bool returned in /home/vagrant/Zend/workspaces/DefaultWorkspace/orderapp/src/OrderApp/Model/CustomersModel.php on line 32
Call Stack
#	Time	Memory	Function	Location
1	0.0001	360936	{main}( )	.../index.php:0
2	0.0019	414440	OrderApp\Controller\IndexController->index( )	.../index.php:29
3	0.0019	414440	OrderApp\Controller\IndexController->__call( $method = 'index', $params = [] )	.../index.php:29
4	0.0019	414480	OrderApp\Controller\IndexController->indexAction( )	.../AbstractController.php:50
5	0.0047	454288	OrderApp\Domain\Domain->processInput( $form = class OrderApp\Form\AddOrderForm { protected $elements = [0 => class OrderApp\Core\Form\Inputs\Text { ... }, 1 => class OrderApp\Core\Form\Inputs\SelectAssoc { ... }, 2 => class OrderApp\Core\Form\Inputs\Text { ... }, 3 => class OrderApp\Core\Form\Inputs\Select { ... }, 4 => class OrderApp\Core\Form\Inputs\Textarea { ... }, 5 => class OrderApp\Core\Form\Inputs\Submit { ... }]; protected $models = []; protected $rawData = ['order_date' => '2021-03-02', 'cust_id' => '3', 'amount' => '9.99', 'status_filter' => 'all', 'description' => 'Test 2021-03-02 23:54', 'submit' => 'Add Order']; protected $data = ['order_date' => '2021-03-02', 'cust_id' => '3', 'amount' => '9.99', 'status_filter' => 'all', 'description' => 'Test 2021-03-02 23:54']; public $isValid = TRUE; protected array $config = ['name' => 'AddOrderForm', 'id' => 'addorder', 'method' => 'post', 'action' => 'index.php'] } )	.../IndexController.php:45
6	0.0047	454288	OrderApp\Model\CustomersModel->getCustomer( $id = 3 )	.../Domain.php:44
```
* Research const. arg. promo.:
```
PHP Fatal error:  Uncaught Error: Typed property UserEntity::$lastName must not be accessed before initialization in /home/vagrant/Zend/workspaces/DefaultWorkspace/sandbox/test.php:22
```

