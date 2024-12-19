<?php

namespace Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Joinbiz\Data\DataSecurityServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;


class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

    }

    protected function getPackageProviders($app)
    {
        return [
            DataSecurityServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

    }
}
