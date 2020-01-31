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

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Vinkla\Facebook\FacebookServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return FacebookServiceProvider::class;
    }
}
