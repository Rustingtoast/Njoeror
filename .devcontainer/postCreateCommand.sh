#!/bin/bash

sudo chmod a+rx "$(pwd)/public_html/public"
sudo rm -rf /var/www/html
sudo ln -s "$(pwd)/public_html/public" /var/www/html
sudo a2enmod rewrite
echo 'error_reporting=0' | sudo tee /usr/local/etc/php/conf.d/no-warn.ini
sudo apache2ctl start