<?php

/*
 * This file is part of Laravel Facebook.
 *
  * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Facebook\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Facebook facade class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Facebook extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'facebook';
    }
}
