<?php

namespace KatalinKS\CompanyPlaces;

use KatalinKS\CompanyPlaces\Commands\CompanyPlacesCommand;
use KatalinKS\CompanyPlaces\Interfaces\Place as PlaceContract;
use KatalinKS\CompanyPlaces\Models\CompanyPlace;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CompanyPlacesServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        $this->app->singleton(\KatalinKS\CompanyPlaces\Interfaces\CompanyPlaces::class, CompanyPlaces::class);

        $this->registerModels();

        return parent::boot();
    }

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

    protected function registerModels(): self
    {
        $this->app->bind(PlaceContract::class, CompanyPlace::class);

        return $this;
    }
}
