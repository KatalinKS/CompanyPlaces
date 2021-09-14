<?php

namespace KatalinKS\CompanyPlaces;

use KatalinKS\CompanyPlaces\Models\CompanyPlace;

class CompanyPlaces implements \KatalinKS\CompanyPlaces\Interfaces\CompanyPlaces
{
    public function getProcessingOffice(): CompanyPlace
    {
        return CompanyPlace::first();
    }
}
