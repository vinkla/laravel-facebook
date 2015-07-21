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

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Schimpanz\Facebook\FacebookServiceProvider;

/**
 * This is the abstract test class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return FacebookServiceProvider::class;
    }
}
