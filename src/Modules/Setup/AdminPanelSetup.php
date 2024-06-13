<?php

namespace Nobir\TheBackendWizard\Modules\Setup;

use Illuminate\Support\Facades\Artisan;
use Nobir\TheBackendWizard\Interfaces\ModuleInterface;
use Nobir\TheBackendWizard\Modules\BaseModule;
use Nobir\TheBackendWizard\Traits\PathManager;

class AdminPanelSetup extends BaseModule implements ModuleInterface
{
    public $pathManager;
   public function __construct()
   {
    $this->pathManager = new PathManager();
   }
    public $path;

    public function command()
    {

    }

    public function run($data)
    {
        Artisan::call('vendor:publish',[
            '--tag' => 'backend-setup',
        ]);
        echo Artisan::output();
        echo "Please install breeze and run' npm install' and 'npm run dev' and 'npm run build'";

        $this->seederCall();
    }
    public function seederCall(){
        
    }
}
