## PHP OAuth 2.0 Server Manager

This is a manager interface for the [lucadegasperi/oauth2-server-laravel](https://github.com/lucadegasperi/oauth2-server-laravel) package.

This application makes maintaining your OAuth2 clients, grants and scopes a breeze. Clients get added with UUID's for their client ID and secret.

### Installation

**This package does not manage your OAuth 2.0 Server migrations and/or installation, a standalone installation of the [lucadegasperi/oauth2-server-laravel](https://github.com/lucadegasperi/oauth2-server-laravel) package is required.**

This application is build on [Laravel](http://laravel.com) for a complete installation guide for Laravel applications please check the [Laravel Docs](http://laravel.com/docs/4.2/quick).

#### Quickstart

To install this application you will need:

- PHP >= 5.4
- MCrypt PHP Extension

After cloning or downloading this application you need to run ```composer install``` from the root of the application directory.

Creating a copy of the ```.env.example``` as ```.env.php```, ```.env.production.php``` or ```.env.local.php``` enables you to configure your API/OAuth database connection.

A working example configuration for laravel/homestead:

```PHP
	/*
	|--------------------------------------------------------------------------
	| API database credentials
	|--------------------------------------------------------------------------
	*/

	'DB_OAUTH_HOST' => 'localhost',

	'DB_OAUTH_DATABASE' => 'api',

	'DB_OAUTH_USERNAME' => 'homestead',

	'DB_OAUTH_PASSWORD' => 'secret',
```

You should now be able to visit the application in your browser and view your OAuth 2.0 Server clients, grants and scopes.

### Credits

- [Kevin Dierkx](https://github.com/kevindierkx)

### License

The MIT License (MIT). Please see [License File](https://github.com/pcextreme/oauth2-server-manager-laravel/blob/master/LICENSE) for more information.
