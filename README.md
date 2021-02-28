# php-ii-mar-2021

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
