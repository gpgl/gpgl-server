# GPL PHP GPG Locker Server

This is the HTTP server for [console client][1] remote push and pull.

## Docker Installation

The best way to install is with [docker][3] and [docker-compose][5].

First download [docker-compose.yml][4].

Then run the setup script.

    docker-compose run --rm gpglserver setup

Finally bring up the network:

    docker-compose up -d

There are also default environment variables which you can override.

    GPGL_SERVER_PORT_SSL=4343 docker-compose up -d

*Note* that the server is configured to always redirect http to https,
so if you override `GPGL_SERVER_PORT_SSL` then you should
always connect directly to that port number.

## Manual Installation

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
[3]:https://www.docker.com/
[4]:./docker/docker-compose.yml
[5]:https://github.com/docker/compose/releases
