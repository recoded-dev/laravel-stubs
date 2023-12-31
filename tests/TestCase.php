<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Recoded\LaravelStubs\Providers\StubsServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [StubsServiceProvider::class];
    }
}
