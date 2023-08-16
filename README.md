# Laravel Starter Kit

This is a starter kit for Laravel that includes auth features like **login**, **register** and **forgot password**. All based on Fortify.

If you don't like using tailwind and livewire, maybe this starter kit is for you.

## What is included ?
* Laravel 10
* Welcome page
* Home page (when logged in)
* Login
* Register
* Forgot password process (This will require to set up mailing configuration in your `.env`)
* Logout
* Laravel Debug Bar
* Vuejs 3 integration
* Bootstrap 5
* A `Vuejs` Example Component
* Some css utilities for additional widths in `app.css`


## Installation

Just clone the repository, then run

```shell
composer install
```

```shell
npm run dev
```

## Customization

### Auth
If you want to change anything about auth logic you have to check `FortifyServiceProvider` class.

The `CreateNewUser` Fortify action is responsible for registration.

If you need more information, please refer to Laravel doc https://laravel.com/docs/10.x/fortify


### app.js
This file includes the regular import of Laravel bootstrap file, and the import of the bootstrap 5 framework js, as well as setting up Vuejs.
