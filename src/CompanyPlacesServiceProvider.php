<?php

namespace KatalinKS\CompanyPlaces;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use KatalinKS\CompanyPlaces\Commands\CompanyPlacesCommand;

class CompanyPlacesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('companyplaces')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_companyplaces_table')
            ->hasCommand(CompanyPlacesCommand::class);
    }
}
