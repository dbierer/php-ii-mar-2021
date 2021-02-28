#!/usr/bin/env bash
# Usage: phpmyadmin_install.sh VERSION
export WEB_SVR_USER="www-data"
export PHPADMIN_DIR=/usr/share/phpmyadmin
if [[ -z "$1" ]]; then
    export VER=5.1.0
else
    export VER=$1
fi
cd /tmp
wget -O phpMyAdmin-$VER-all-languages.tar.gz https://files.phpmyadmin.net/phpMyAdmin/$VER/phpMyAdmin-$VER-all-languages.tar.gz
tar -xvf phpMyAdmin-$VER-all-languages.tar.gz
cp -rf phpMyAdmin-$VER-all-languages/* $PHPADMIN_DIR
rm -rf phpMyAdmin-$VER-all-languages
cp $PHPADMIN_DIR/config.sample.inc.php $PHPADMIN_DIR/config.inc.php
sed -i "s/AllowNoPassword'] = false;/AllowNoPassword'] = true;/" $PHPADMIN_DIR/config.inc.php
echo "Setting apache as owner ..."
chown -v $WEB_SVR_USER:$WEB_SVR_USER $PHPADMIN_DIR
echo "Configuring blowfish secret in /srv/phpmyadmin/config.inc.php ... "
export SECRET=`php -r "echo md5(date('Y-m-d-H-i-s') . rand(1000,9999));"`
echo "\$cfg['blowfish_secret'] = '$SECRET';" >> $PHPADMIN_DIR/config.inc.php
if [[ $? -gt 0 ]]; then
    echo -e "\nphpMyAdmin Installation ERROR!  Aborting!\n"
    exit 1
fi
service mysqld restart
service apache2 restart
echo -e "\nphpMyAdmin Installation DONE!\n"
cd
