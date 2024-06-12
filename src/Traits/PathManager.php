<?php

namespace Nobir\TheBackendWizard\Traits;

trait PathManager
{
    public $paths;

    //modules
    const ADMINPANELSETUP = 'set';
    const USERMANAGEMENT = 'user-management';

    public function __construct() {
        $this->paths = config('backend');
        $this->pathExistChecking();
    }

    public function pathExistChecking(){
        if(count($this->paths)<1){
            echo 'Please, check your backend config. If necessary delete that config file and re-run the command "php artisan vendor:pulish --tag=backend-config"';
        }elseif($this->paths == NULL){
            echo 'Please, run this command "php artisan vendor:publish --tag=backend-config"';
        }
    }

}
