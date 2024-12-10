<?php

namespace Joinbiz\Data\Models\Security;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Joinbiz\Data\Models\Security\Commands\DataSecurityCommand;

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
