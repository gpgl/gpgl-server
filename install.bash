#!/bin/bash

qdbp create --environment=dev

cp .env.example .env

# TODO: copy database credentials

composer install

npm install
npm run dev

php artisan key:generate
php artisan passport:install

echo
echo 'copy database credentials, artisan migrate'
# TODO: php artisan migrate
