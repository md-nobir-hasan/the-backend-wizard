<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;
use Nobir\TheBackendWizard\Modules\Setup\AdminPanelSetup;
use Nobir\TheBackendWizard\Traits\DataProcessing;

class TheBackendWizardCommand extends Command
{
    use DataProcessing;

    public $signature = 'nobir:backend {moduleName}';

    public $description = 'Enter a module name';

    //modules name
    const ADMINPANELSETUP = 'setup';

    const USERMANAGEMENT = 'user-management';

    public function handle(): int
    {
        $modul_name = $this->argument('moduleName');
        //transfer to specific module
        switch ($modul_name) {
            case self::ADMINPANELSETUP:
                $this->adminPanelSetup();
                break;
        }

        return self::SUCCESS;
    }

    public function adminPanelSetup()
    {
        (new AdminPanelSetup())->run([]);
    }
}
