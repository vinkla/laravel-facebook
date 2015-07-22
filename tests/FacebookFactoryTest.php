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
use Schimpanz\Facebook\FacebookFactory;

/**
 * This is the Facebook factory test class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
class FacebookFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getFacebookFactory();

        $return = $factory->make([
            'app_id' => 'your-app-id',
            'app_secret' => 'your-app-scret',
            'default_graph_version' => 'v2.4',
        ]);

        $this->assertInstanceOf(Facebook::class, $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutAppSecret()
    {
        $factory = $this->getFacebookFactory();

        $factory->make(['app_id' => 'your-app-id']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutAppId()
    {
        $factory = $this->getFacebookFactory();

        $factory->make(['app_secret' => 'your-app-secret']);
    }

    protected function getFacebookFactory()
    {
        return new FacebookFactory();
    }
}
