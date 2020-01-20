<?php

/*
 * This file is part of Laravel Facebook.
 *
  * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Facebook;

use Facebook\Facebook;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * This is the Facebook service provider class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class FacebookServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
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

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory(): void
    {
        $this->app->singleton('facebook.factory', function () {
            return new FacebookFactory();
        });

        $this->app->alias('facebook.factory', FacebookFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager(): void
    {
        $this->app->singleton('facebook', function (Container $app) {
            $config = $app['config'];
            $factory = $app['facebook.factory'];

            return new FacebookManager($config, $factory);
        });

        $this->app->alias('facebook', FacebookManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings(): void
    {
        $this->app->bind('facebook.connection', function (Container $app) {
            $manager = $app['facebook'];

            return $manager->connection();
        });

        $this->app->alias('facebook.connection', Facebook::class);
    }

    /**
     * Get the services provided by the provider.
     *
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
