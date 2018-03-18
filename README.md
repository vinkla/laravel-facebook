# Laravel Facebook

![facebook](https://cloud.githubusercontent.com/assets/499192/8819568/a195be0a-304d-11e5-87e6-9a7cdebb32fe.png)

> A [Facebook](https://github.com/facebook/php-graph-sdk) bridge for Laravel.

```php
// Get the current user.
$facebook->get('/me', '{access-token}');

// Fetch the login helper.
Facebook::getRedirectLoginHelper();
```

[![Build Status](https://img.shields.io/travis/vinkla/laravel-facebook/master.svg?style=flat)](https://travis-ci.org/vinkla/laravel-facebook)
[![StyleCI](https://styleci.io/repos/35561124/shield?style=flat)](https://styleci.io/repos/35561124)
[![Coverage Status](https://img.shields.io/codecov/c/github/vinkla/laravel-facebook.svg?style=flat)](https://codecov.io/github/vinkla/laravel-facebook)
[![Total Downloads](https://img.shields.io/packagist/dt/vinkla/facebook.svg?style=flat)](https://packagist.org/packages/vinkla/facebook)
[![Latest Version](https://img.shields.io/github/release/vinkla/facebook.svg?style=flat)](https://github.com/vinkla/facebook/releases)
[![License](https://img.shields.io/packagist/l/vinkla/facebook.svg?style=flat)](https://packagist.org/packages/vinkla/facebook)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require vinkla/facebook
```

Add the service provider to `config/app.php` in the `providers` array, or if you're using Laravel 5.5, this can be done via the automatic package discovery.

```php
Vinkla\Facebook\FacebookServiceProvider::class
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in `config/app.php` to your aliases array.

```php
'Facebook' => Vinkla\Facebook\Facades\Facebook::class
```

## Configuration

Laravel Facebook requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/facebook.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

#### Default Connection Name

This option `default` is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `main`.

#### Facebook Connections

This option `connections` is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like.

## Usage

#### FacebookManager

This is the class of most interest. It is bound to the ioc container as `facebook` and can be accessed using the `Facades\Facebook` facade. This class implements the ManagerInterface by extending AbstractManager. The interface and abstract class are both part of the [Laravel Manager](https://github.com/GrahamCampbell/Laravel-Manager) package, so you may want to go and checkout the docs for how to use the manager class over at that repository. Note that the connection class returned will always be an instance of `Facebook\Facebook`.

#### Facades\Facebook

This facade will dynamically pass static method calls to the `facebook` object in the ioc container which by default is the `FacebookManager` class.

#### FacebookServiceProvider

This class contains no public methods of interest. This class should be added to the providers array in `config/app.php`. This class will setup ioc bindings.

### Examples

Here you can see an example of just how simple this package is to use. Out of the box, the default adapter is `main`. After you enter your authentication details in the config file, it will just work:

```php
// You can alias this in config/app.php.
use Vinkla\Facebook\Facades\Facebook;

Facebook::get('/me', '{access-token}');
// We're done here - how easy was that, it just works!

Facebook::getRedirectLoginHelper();
// This example is simple and there are far more methods available.
```

The Facebook manager will behave like it is a `Facebook\Facebook`. If you want to call specific connections, you can do that with the connection method:

```php
use Vinkla\Facebook\Facades\Facebook;

// Writing this…
Facebook::connection('main')->get('/me', '{access-token}');

// …is identical to writing this
Facebook::get('/me', '{access-token}');

// and is also identical to writing this.
Facebook::connection()->get('/me', '{access-token}');

// This is because the main connection is configured to be the default.
Facebook::getDefaultConnection(); // This will return main.

// We can change the default connection.
Facebook::setDefaultConnection('alternative'); // The default is now alternative.
```

If you prefer to use dependency injection over facades like me, then you can inject the manager:

```php
use Vinkla\Facebook\FacebookManager;

class Foo
{
    protected $facebook;

    public function __construct(FacebookManager $facebook)
    {
        $this->facebook = $facebook;
    }

    public function bar($request)
    {
        $this->facebook->get('/me', '{access-token}');
    }
}

App::make('Foo')->bar();
```

## Documentation
There are other classes in this package that are not documented here. This is because the package is a Laravel wrapper of [official Facebook package](https://github.com/facebook/facebook-php-sdk-v4).

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
