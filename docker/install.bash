#!/bin/bash

set -e

# dependencies
apt-get update && apt-get install -y \
    wget netcat apache2 libapache2-mod-php php-mbstring php-zip php-mysql php-mcrypt

# source
mkdir -p /var/www/html/ && cd /var/www/html/
wget https://github.com/gpgl/server/archive/master.tar.gz
tar zxfv master.tar.gz --strip 1
touch ./storage/logs/laravel.log
chown -R www-data ./bootstrap/cache ./storage
rm -rf master.tar.gz

# composer
EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; then
    >&2 echo 'ERROR: Invalid installer signature';
    exit 1;
fi
php composer-setup.php --quiet
mv composer.phar /usr/bin/composer
rm composer-setup.php
composer install --no-dev

# apache
a2enmod ssl rewrite headers deflate

# cleanup
apt-get purge -y wget
apt-get autoremove -y
apt-get clean
rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
