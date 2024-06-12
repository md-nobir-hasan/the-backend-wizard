<?php

namespace Nobir\TheBackendWizard\Modules;

use Nobir\TheBackendWizard\Interfaces\ModuleInterface;

class AdminPanelSetup extends BaseModule implements ModuleInterface
{
    public $path;

    public function command()
    {

    }

    public function run($data)
    {
        $paths = config('backend');
        dd($paths);
    }
}
