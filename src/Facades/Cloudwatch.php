<?php

namespace AdamRollinson\Cloudwatch\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AdamRollinson\Cloudwatch\Cloudwatch
 */
class Cloudwatch extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AdamRollinson\Cloudwatch\Cloudwatch::class;
    }
}
