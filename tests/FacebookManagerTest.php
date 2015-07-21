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
use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Mockery;
use Schimpanz\Facebook\FacebookFactory;
use Schimpanz\Facebook\FacebookManager;

/**
 * This is the Facebook manager test class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
class FacebookManagerTest extends AbstractTestBenchTestCase
{
    public function testCreateConnection()
    {
        $config = ['path' => __DIR__];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('facebook.default')->andReturn('facebook');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(Facebook::class, $return);

        $this->assertArrayHasKey('facebook', $manager->getConnections());
    }

    protected function getManager(array $config)
    {
        $repository = Mockery::mock(Repository::class);
        $factory = Mockery::mock(FacebookFactory::class);

        $manager = new FacebookManager($repository, $factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('facebook.connections')->andReturn(['facebook' => $config]);

        $config['name'] = 'facebook';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(Facebook::class));

        return $manager;
    }
}
