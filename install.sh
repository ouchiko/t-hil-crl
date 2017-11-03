#!/bin/bash
apt-get update
apt-get install -y php-curl
/etc/init.d/apache2 restart
