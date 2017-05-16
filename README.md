# GPL PHP GPG Locker Server

This is the HTTP server for [console client][1] remote push and pull.

## Installation

Follow the documentation for [installing a Laravel application][1].

tl;dr

* create a MySQL database and user account
* `cp .env.example .env`
* update credentials in `.env`
* `composer install`
* `npm install`
* `npm run prod`
* `php artisan migrate`
* `php artisan key:generate`
* `php artisan passport:install`
* generate SSL certificate key-pair
* proxy nginx
* enable firewall rules

## Testing

The API endpoints are all covered within integration tests in [gpgl console][1].

For the web interface, I just opened up a can of Laravel and dished it out.
It's very simple and built with stock components, so there are no tests.

<p align="center">
    <a href="https://laravel.com/">
        <img src="https://laravel.com/assets/img/components/logo-laravel.svg" />
    </a>
</p>

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

[1]:https://github.com/gpgl/console
[2]:https://laravel.com/docs/5.4#installation
