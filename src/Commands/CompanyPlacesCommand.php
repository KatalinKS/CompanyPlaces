<?php

namespace KatalinKS\CompanyPlaces\Commands;

use Illuminate\Console\Command;

class CompanyPlacesCommand extends Command
{
    public $signature = 'companyplaces';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
