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

namespace Vinkla\Tests\Facebook\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Vinkla\Facebook\Facades\Facebook;
use Vinkla\Facebook\FacebookManager;
use Vinkla\Tests\Facebook\AbstractTestCase;

class FacebookTest extends AbstractTestCase
{
    use FacadeTrait;

    protected function getFacadeAccessor()
    {
        return 'facebook';
    }

    protected function getFacadeClass()
    {
        return Facebook::class;
    }

    protected function getFacadeRoot()
    {
        return FacebookManager::class;
    }
}
