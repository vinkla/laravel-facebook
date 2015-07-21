<?php

/*
 * This file is part of Laravel Facebook.
 *
 * (c) Schimpanz Solutions AB <info@schimpanz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Schimpanz\Tests\Facebook;

use Facebook\Facebook;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Schimpanz\Facebook\FacebookFactory;
use Schimpanz\Facebook\FacebookManager;

/**
 * This is the service provider test class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
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
