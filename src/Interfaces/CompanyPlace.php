<?php

namespace KatalinKS\CompanyPlaces\Interfaces;

use Illuminate\Support\Collection;

interface CompanyPlace
{
    public function getOrdersEmails(): Collection;
}
