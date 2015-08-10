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

use Facebook\Facebook;

/**
 * This is the Facebook facade class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
class FacebookFactory
{
    /**
     * Make a new Facebook client.
     *
     * @param array $config
     *
     * @return \Facebook\Facebook
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        $requiredKeys = ['app_id', 'app_secret', 'default_graph_version'];
        $optionalKeys = ['default_access_token'];
        $validKeys = array_merge($requiredKeys, $optionalKeys);

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new \InvalidArgumentException('The Facebook client requires configuration.');
            }
        }

        return array_only($config, $validKeys);
    }

    /**
     * Get the Facebook client.
     *
     * @param string[] $config
     *
     * @return \Facebook\Facebook
     */
    protected function getClient(array $config)
    {
        return new Facebook($config);
    }
}
