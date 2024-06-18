<?php

namespace Nobir\TheBackendWizard\Commands;

use App\Models\Backend\NSidebar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Nobir\TheBackendWizard\Modules\Setup\AdminPanelSetup;
use Nobir\TheBackendWizard\Services\CleanBackendPanel;
use Nobir\TheBackendWizard\Traits\DataProcessing;

class TheBackendWizardCommand extends Command
{
    use DataProcessing;

    public $signature = 'nobir:backend {moduleName}';

    public $description = 'Enter a module name';

    //modules name
    const ADMINPANELSETUP = 'setup';
    const USERMANAGEMENT = 'user-management';
    const SIDEBAR_REFRESH = 'sidebar-refresh';
    const CLEAN = 'setup-reverse';

    public function handle(): int
    {
        $modul_name = $this->argument('moduleName');
        //transfer to specific module
        switch ($modul_name) {
            case self::ADMINPANELSETUP:
                $this->adminPanelSetup();
                break;

            case self::SIDEBAR_REFRESH:
                $this->sidebarRefresh();
                break;

            case self::CLEAN:
                $this->reverseSetup();
                break;
        }

        return self::SUCCESS;
    }

    public function adminPanelSetup()
    {
        (new AdminPanelSetup())->run([]);
    }

    public function sidebarRefresh()
    {
        Cache::forget('nsidebar');
        Cache::rememberForever('nsidebar', function () {
            return NSidebar::with('child_bar')->where('is_parent', true)->where('status', 'Active')->get();
        });
        echo 'Nsidebar is refreshed';
    }

    public function reverseSetup(){
        (new AdminPanelSetup())->down();
    }
}
