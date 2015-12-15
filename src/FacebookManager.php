<?php

/*
 * This file is part of Laravel Facebook.
 *
  * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Facebook;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * This is the Facebook manager class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class FacebookManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \Vinkla\Facebook\FacebookFactory
     */
    private $factory;

    /**
     * Create a new Facebook manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Vinkla\Facebook\FacebookFactory           $factory
     *
     * @return void
     */
    public function __construct(Repository $config, FacebookFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'facebook';
    }

    /**
     * Get the factory instance.
     *
     * @return \Vinkla\Facebook\FacebookFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
