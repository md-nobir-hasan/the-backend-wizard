<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;
use Nobir\TheBackendWizard\Modules\AdminPanelSetup;

class TheBackendWizardCommand extends Command
{
    use DataProcess;

    public $signature = 'nobir:admin {moduleName}';

    public $description = 'Enter a module name';

    //modules
    const ADMINPANELSETUP = 'admin-panel-setup';

    const USERMANAGEMENT = 'user-management';

    public function handle(): int
    {
        $modul_name = $this->argument('moduleName');
        switch ($modul_name) {
            case self::ADMINPANELSETUP:
                $this->adminPanelSetup();

        }

        return self::SUCCESS;
    }

    public function adminPanelSetup()
    {
        $data = [];
        $data.push()(new AdminPanelSetup)->run($data);
    }
}
