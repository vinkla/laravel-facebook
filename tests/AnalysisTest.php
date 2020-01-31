<?php

/*
 * This file is part of Laravel Facebook.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Tests\Facebook;

use GrahamCampbell\Analyzer\AnalysisTrait;
use Laravel\Lumen\Application;
use PHPUnit\Framework\TestCase;

class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    protected function getPaths()
    {
        return [
            realpath(__DIR__ . '/../config'),
            realpath(__DIR__ . '/../src'),
            realpath(__DIR__),
        ];
    }

    protected function getIgnored()
    {
        return [Application::class];
    }
}
