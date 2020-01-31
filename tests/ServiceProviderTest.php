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

namespace Vinkla\Tests\Facebook;

use Facebook\Facebook;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Vinkla\Facebook\FacebookFactory;
use Vinkla\Facebook\FacebookManager;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testFacebookFactoryIsInjectable()
    {
        $this->assertIsInjectable(FacebookFactory::class);
    }

    public function testFacebookManagerIsInjectable()
    {
        $this->assertIsInjectable(FacebookManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(Facebook::class);

        $original = $this->app['facebook.connection'];
        $this->app['facebook']->reconnect();
        $new = $this->app['facebook.connection'];

        $this->assertNotSame($original, $new);
        $this->assertEquals($original, $new);
    }
}
