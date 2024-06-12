<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;
use Nobir\TheBackendWizard\Modules\AdminPanelSetup;
use Nobir\TheBackendWizard\Traits\DataProcessing;
use Nobir\TheBackendWizard\Traits\PathManager;

class TheBackendWizardCommand extends Command
{
    use DataProcessing, PathManager;
    public $signature = 'nobir:backend {moduleName}';

    public $description = 'Enter a module name';


    public function handle(): int
    {
        $modul_name = $this->argument('moduleName');
        switch ($modul_name) {
            case self::ADMINPANELSETUP:
                $this->adminPanelSetup();
                break;
        }

        return self::SUCCESS;
    }

    public function adminPanelSetup()
    {

        (new AdminPanelSetup)->run([]);
    }
}
