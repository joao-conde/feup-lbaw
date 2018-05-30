#!/bin/bash
set -e

env >> /var/www/.env
php-fpm7.1 -D

cd /var/www
ln -s ../storage/app/public public/storage
cd ../..

nginx -g "daemon off;"
