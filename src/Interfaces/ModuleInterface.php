<?php
namespace Nobir\TheBackendWizard\Interfaces;

interface ModuleInterface{
    public function command();
    public function run($data);
}

?>
