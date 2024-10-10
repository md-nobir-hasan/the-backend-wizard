<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;
use Nobir\TheBackendWizard\HelperClass\CommandName;
use Nobir\TheBackendWizard\HelperClass\Module;
use Nobir\TheBackendWizard\Modules\Setup\AdminPanelSetup;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class TheBackendWizardCommand extends Command
{
    public $signature = 'nobir:backend {moduleName}';

    public $description = 'Enter a module name';

    protected array $config;

    public function handle(): int
    {
        $modul_name = $this->argument('moduleName');

        $config = config('nbackend');

        if ($config == null) {
            $this->error('Please, run php artisan vendor:publish --tag=backend-config');

            return false; // Stop execution
        }

        $this->config = $config;

        $this->warn('Please, see the nbackend.php config file. everything setting up according to the file');

        //transfer to specific module
        switch ($modul_name) {
            case CommandName::SETUP:
                $module = Module::create(CommandName::SETUP);
                $this->process($module);
                break;

                // case CommandName::SIDEBAR_REFRESH:
                //     $this->sidebarRefresh();
                //     break;

                // case CommandName::CLEAN:
                //     $this->reverseSetup();
                //     break;
            default:
                $this->error('Please provide a valid command');

                return false;
        }

        if ($module) {

        }

        return self::SUCCESS;
    }

    public function process($module)
    {

        //Stater kids installation
        switch ($this->config['stater_kids']) {
            case 'breeze':
                $this->installBreeze();
            default:
                break;
        }

        $this->info('Publishing the necessary files...');
        $module->publish();

        $this->info('Replacing the necessary files....\n');
        $module->replaceContent();

        $this->info('Replacing done.🦾\n');

        // $this->call('migrate');

        if ($this->config['asset_build']) {
            $this->assetBuild();
        }

    }

    protected function installBreeze()
    {
        $this->info('Installing Laravel Breeze...');
        $composer = $this->findComposer();
        $this->executeShellCommand("$composer require laravel/breeze --dev");

        // Install Laravel Breeze scaffolding with default stack (e.g., Blade, no dark mode, Pest for testing)
        $this->installBreezeScaffolding();

        // Run migrations
        $this->info('Breeze installation is completed!');
    }

    protected function installBreezeScaffolding()
    {
        $this->info('Installing Breeze scaffolding with blade, alpine, no dark mode, pest for testing options...');

        // Simulate user input for the Breeze scaffolding process
        $process = new Process(['php', 'artisan', 'breeze:install']);
        $process->setInput("blade\nno\n0\n"); // Simulate default answers for the prompts:
        // 0 -> Blade (choose stack)
        // no -> No dark mode
        // 0 -> Pest for testing framework
        $process->setTimeout(null);

        $process->run();

        // Check if the process was successful
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->info($process->getOutput());
    }

    protected function executeShellCommand($command)
    {
        $this->info("Running: $command");
        $process = proc_open($command, [
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ], $pipes);

        if (is_resource($process)) {
            while ($output = fgets($pipes[1])) {
                $this->line(string: $output);
            }
            while ($error = fgets($pipes[2])) {
                $this->error($error);
            }
            proc_close($process);
        }
    }

    protected function findComposer()
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return 'php composer.phar';
        }

        return 'composer';
    }

    protected function findNpm()
    {
        // Check for a project-local NPM installation
        if (file_exists(getcwd().'/node_modules/.bin/npm')) {
            return './node_modules/.bin/npm';
        }

        // Fall back to global NPM
        return 'npm';
    }

    protected function assetBuild(): void
    {
        // Install NPM dependencies
        $this->executeShellCommand('npm install');

        // Compile assets
        $this->executeShellCommand('npm run build');

    }

    public function reverseSetup()
    {
        (new AdminPanelSetup)->down();
    }
}
