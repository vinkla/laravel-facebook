<?php

/*
 * This file is part of Laravel Facebook.
 *
  * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Tests\Facebook\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Vinkla\Facebook\Facades\Facebook;
use Vinkla\Facebook\FacebookManager;
use Vinkla\Tests\Facebook\AbstractTestCase;

/**
 * This is the Facebook facade test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
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
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return FacebookManager::class;
    }
}
