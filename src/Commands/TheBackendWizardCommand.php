<?php

namespace Nobir\TheBackendWizard\Commands;

use App\Models\Backend\NSidebar;
use Artisan;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Cache;
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

    const SIDEBAR_REFRESH = 'sidebar-refresh';

    const CLEAN = 'setup-reverse';

    protected array $config;

    public function handle(): int
    {
        $modul_name = $this->argument('moduleName');

        $config = config('nbackend');

        if($config == null){
            $this->error('Please, run php artisan vendor:publish --tag=backend-config');
            return false; // Stop execution
        }

        $this->config = $config;

        $this->warn('Please, see the nbackend.php config file. everything setup according to the file');

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

        //Stater kids installation
          switch($this->config['stater_kids']){
            case 'breeze':
                $this->installBreeze();
            default:
                break;
          }


        (new AdminPanelSetup())->run([]);

        $this->call('migrate');

        if($this->config['asset_build']){
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
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->info($process->getOutput());
    }

    protected function executeShellCommand($command)
    {
        $this->info("Running: $command");
        $process = proc_open($command, [
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w']
        ], $pipes);

        if (is_resource($process)) {
            while ($output = fgets($pipes[1])) {
                $this->line($output);
            }
            while ($error = fgets($pipes[2])) {
                $this->error($error);
            }
            proc_close($process);
        }
    }

    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return 'php composer.phar';
        }

        return 'composer';
    }

    protected function assetBuild():void{
        // Install NPM dependencies
        $this->executeShellCommand('npm install');

        // Compile assets
        $this->executeShellCommand('npm run build');

    }

    public function sidebarRefresh()
    {
        Cache::forget('nsidebar');
        Cache::rememberForever('nsidebar', function () {
            return NSidebar::with('child_bar')->where('is_parent', true)->where('status', 'Active')->get();
        });
        echo 'Nsidebar is refreshed';
    }

    public function reverseSetup()
    {
        (new AdminPanelSetup())->down();
    }
}
