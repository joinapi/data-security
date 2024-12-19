<?php

namespace Joinbiz\Data;

use Joinbiz\Data\Models\Security\Commands\DataSecurityCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DataSecurityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        $package
            ->name('data-security')
            ->hasConfigFile()
            ->hasCommand(DataSecurityCommand::class);
    }
}
