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

namespace Vinkla\Tests\Facebook;

use Facebook\Facebook;
use InvalidArgumentException;
use Vinkla\Facebook\FacebookFactory;

/**
 * This is the Facebook factory test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
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
