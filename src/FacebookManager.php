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
use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class FacebookManager extends AbstractManager
{
    protected FacebookFactory $factory;

    public function __construct(Repository $config, FacebookFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    protected function createConnection(array $config): Facebook
    {
        return $this->factory->make($config);
    }

    protected function getConfigName(): string
    {
        return 'facebook';
    }

    public function getFactory(): FacebookFactory
    {
        return $this->factory;
    }
}
