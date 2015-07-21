<?php

/*
 * This file is part of Laravel Facebook.
 *
 * (c) Schimpanz Solutions AB <info@schimpanz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Schimpanz\Facebook;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * This is the Facebook manager class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
class FacebookManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \Schimpanz\Facebook\FacebookFactory
     */
    private $factory;

    /**
     * Create a new Facebook manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Schimpanz\Facebook\FacebookFactory           $factory
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
     * @return \Schimpanz\Facebook\FacebookFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
