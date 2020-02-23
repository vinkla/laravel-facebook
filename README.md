# Laravel Facebook

![facebook](https://cloud.githubusercontent.com/assets/499192/8819568/a195be0a-304d-11e5-87e6-9a7cdebb32fe.png)

> A [Facebook](https://github.com/facebook/php-graph-sdk) bridge for Laravel.

```php
// Get the current user.
$facebook->get('/me', '{access-token}');

// Fetch the login helper.
Facebook::getRedirectLoginHelper();
```

[![Build Status](https://badgen.net/github/status/vinkla/laravel-facebook/master)](https://github.com/vinkla/laravel-facebook/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/vinkla/facebook)](https://packagist.org/packages/vinkla/laravel-facebook/stats)
[![Latest Version](https://badgen.net/github/release/vinkla/laravel-facebook)](https://github.com/vinkla/laravel-facebook/releases)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require vinkla/facebook
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

Here you can see an example of you may use this package. Out of the box, the default adapter is `main`. After you enter your authentication details in the config file, it will just work:

```php
// You can alias this in config/app.php.
use Vinkla\Facebook\Facades\Facebook;

// We're done here - how easy was that, it just works!
Facebook::get('/me', '{access-token}');

// This example is simple and there are far more methods available.
Facebook::getRedirectLoginHelper();
```

The manager will behave like it is a `Facebook\Facebook` class. If you want to call specific connections, you can do that with the connection method:

```php
use Vinkla\Facebook\Facades\Facebook;

// Writing this...
Facebook::connection('main')->get('/me', '{access-token}');

// ...is identical to writing this
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

For more information on how to use the `Facebook\Facebook` class, check out the docs at [`facebook/graph-sdk`](https://github.com/facebook/php-graph-sdk).

## License

[MIT](LICENSE) © [Vincent Klaiber](https://doubledip.se)
