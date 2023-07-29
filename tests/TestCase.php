<?php

namespace AdamRollinson\Cloudwatch\Tests;

use AdamRollinson\Cloudwatch\CloudwatchServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            CloudwatchServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        //
    }
}
