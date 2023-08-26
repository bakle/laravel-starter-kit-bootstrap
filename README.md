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
* RBAC functionality
  * Roles creation
  * Assign permissions to roles
  * Default seeder to seed permissions


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


## RBAC
RBAC includes listing roles, creating a role and assigning permissions and editing roles with their permissions.

### Permissions

By default, it includes a `permissions` enum file. In this file you will see the application permissions and the RBAC permissions (deleting RBAC permissions may cause unexpected behaviour in RBAC module). You are free to modify non RBAC permissions as your need. 

### Permission seeder
It also includes a `PermissionSeeder` file that seed your permissions, feel free to modify it if needed.

### Policy
This starter kit includes a `UserPolicy` as an example.

### Authorize
By default, anyone can access rbac module, you will need to uncomment the `authorizeResource` method in `RoleController` constructor. 



