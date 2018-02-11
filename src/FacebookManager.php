<?php

/*
 * This file is part of Laravel Facebook.
 *
  * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Facebook;

use Facebook\Facebook;
use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * This is the facebook manager class.
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
    protected $factory;

    /**
     * Create a new facebook manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Vinkla\Facebook\FacebookFactory $factory
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
     * @return \Facebook\Facebook
     */
    protected function createConnection(array $config): Facebook
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'facebook';
    }

    /**
     * Get the factory instance.
     *
     * @return \Vinkla\Facebook\FacebookFactory
     */
    public function getFactory(): FacebookFactory
    {
        return $this->factory;
    }
}
