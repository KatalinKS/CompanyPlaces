<?php

namespace KatalinKS\CompanyPlaces\Interfaces;

use KatalinKS\CompanyPlaces\Models\CompanyPlace;

interface CompanyPlaces
{
    public function getProcessingOffice(): CompanyPlace;
}
