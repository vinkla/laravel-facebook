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
use InvalidArgumentException;
use Vinkla\Facebook\FacebookFactory;

class FacebookFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getFacebookFactory();

        $return = $factory->make([
            'app_id' => 'your-app-id',
            'app_secret' => 'your-app-secret',
            'default_graph_version' => 'v2.4',
        ]);

        $this->assertInstanceOf(Facebook::class, $return);
    }

    public function testMakeWithoutAppSecret()
    {
        $this->expectException(InvalidArgumentException::class);

        $factory = $this->getFacebookFactory();

        $factory->make(['app_id' => 'your-app-id']);
    }

    public function testMakeWithoutAppId()
    {
        $this->expectException(InvalidArgumentException::class);

        $factory = $this->getFacebookFactory();

        $factory->make(['app_secret' => 'your-app-secret']);
    }

    protected function getFacebookFactory()
    {
        return new FacebookFactory();
    }
}
