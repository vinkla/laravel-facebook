<?php

/*
 * This file is part of Laravel Facebook.
 *
 * (c) Schimpanz Solutions AB <info@schimpanz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Schimpanz\Tests\Facebook\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Schimpanz\Facebook\Facades\Facebook;
use Schimpanz\Facebook\FacebookManager;
use Schimpanz\Tests\Facebook\AbstractTestCase;

/**
 * This is the Facebook facade test class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
class FacebookTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'facebook';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Facebook::class;
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return FacebookManager::class;
    }
}
