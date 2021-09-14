<?php

namespace KatalinKS\CompanyPlaces\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use KatalinKS\CompanyPlaces\CompanyPlacesServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'KatalinKS\\CompanyPlaces\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            CompanyPlacesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_companyplaces_table.php.stub';
        $migration->up();
        */
    }
}
