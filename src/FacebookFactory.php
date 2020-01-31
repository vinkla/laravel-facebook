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

namespace Vinkla\Facebook;

use Facebook\Facebook;
use Illuminate\Support\Arr;
use InvalidArgumentException;

class FacebookFactory
{
    public function make(array $config): Facebook
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * @throws \InvalidArgumentException
     */
    protected function getConfig(array $config): array
    {
        $keys = ['app_id', 'app_secret'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return Arr::only($config, [
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

    protected function getClient(array $config): Facebook
    {
        return new Facebook($config);
    }
}
