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
use InvalidArgumentException;

/**
 * This is the facebook facade class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class FacebookFactory
{
    /**
     * Make a new facebook client.
     *
     * @param array $config
     *
     * @return \Facebook\Facebook
     */
    public function make(array $config): Facebook
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
    protected function getConfig(array $config): array
    {
        $keys = ['app_id', 'app_secret'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return array_only($config, [
            'app_id',
            'app_secret',
            'default_access_token',
            'default_graph_version',
            'enable_beta_mode',
            'http_client_handler',
            'persistent_data_handler',
            'url_detection_handler',
        ]);
    }

    /**
     * Get the facebook client.
     *
     * @param string[] $config
     *
     * @return \Facebook\Facebook
     */
    protected function getClient(array $config): Facebook
    {
        return new Facebook($config);
    }
}
