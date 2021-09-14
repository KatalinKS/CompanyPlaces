<?php

namespace KatalinKS\CompanyPlaces;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KatalinKS\CompanyPlaces\CompanyPlaces
 */
class CompanyPlacesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'companyplaces';
    }
}
