# Livewire Tailwind Auth

Basic Laravel auth scaffolding using Livewire and Tailwind.

NPM must be installed on your machine to use this package!

## Installation

Install via composer:

    composer require redbastie/livewire-tailwind-auth

## Usage

It is strongly recommended to use this package with a new Laravel app.

Install Laravel:

    laravel new my-app-name

Configure `.env` app, database, and mail values:

    APP_*
    DB_*
    MAIL_*

Make Livewire Tailwind Auth via the `make:auth` command:

    php artisan make:auth

This will run the necessary NPM commands and create/overwrite the following files:

    app/Http/Livewire/*
    database/seeders/DatabaseSeeder.php
    resources/css/app.css
    resources/views/*
    tailwind.config.js
    webpack.mix.js

Now you can login to your app using `user@example.com:password`.
