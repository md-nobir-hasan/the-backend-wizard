<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;

class TheBackendWizardCommand extends Command
{
    public $signature = 'nobir:admin {moduleName}';

    public $description = 'Enter a module name';

    //modules
    const ADMINPANELSETUP='admin-panel-setup';
    const USERMANAGEMENT='admin-panel-setup';
    public function handle(): int
    {
        $this->info($this->argument('moduleName'));

        return self::SUCCESS;
    }



}
