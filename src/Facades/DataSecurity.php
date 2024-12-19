<?php

namespace Facades;

namespace Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Joinbiz\Data\Models\Security\DataSecurity
 */
class DataSecurity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Joinbiz\Data\DataSecurity::class;
    }
}
