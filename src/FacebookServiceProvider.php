<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-facebook
 */

declare(strict_types=1);

namespace Vinkla\Facebook;

use Facebook\Facebook;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class FacebookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setupConfig();
    }

    protected function setupConfig(): void
    {
        $source = realpath($raw = __DIR__ . '/../config/facebook.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('facebook.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('facebook');
        }

        $this->mergeConfigFrom($source, 'facebook');
    }

    public function register(): void
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    protected function registerFactory(): void
    {
        $this->app->singleton('facebook.factory', function () {
            return new FacebookFactory();
        });

        $this->app->alias('facebook.factory', FacebookFactory::class);
    }

    protected function registerManager(): void
    {
        $this->app->singleton('facebook', function (Container $app) {
            $config = $app['config'];
            $factory = $app['facebook.factory'];

            return new FacebookManager($config, $factory);
        });

        $this->app->alias('facebook', FacebookManager::class);
    }

    protected function registerBindings(): void
    {
        $this->app->bind('facebook.connection', function (Container $app) {
            $manager = $app['facebook'];

            return $manager->connection();
        });

        $this->app->alias('facebook.connection', Facebook::class);
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'facebook',
            'facebook.factory',
            'facebook.connection',
        ];
    }
}
