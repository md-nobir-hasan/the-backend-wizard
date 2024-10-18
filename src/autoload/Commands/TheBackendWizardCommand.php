<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;
use Nobir\TheBackendWizard\HelperClass\CommandName;
use Nobir\TheBackendWizard\HelperClass\Module;
use Nobir\TheBackendWizard\Modules\Setup\AdminPanelSetup;
use Symfony\Component\Process\Process;

class TheBackendWizardCommand extends Command
{
    public $signature = 'nobir:backend {moduleName}';

    public $description = 'Enter a module name';

    public function handle(): int
    {
        //SN: module and the command name are same
        $modul_name = $this->argument('moduleName');

        $config = config('nbackend');

        if ($config == null) {
            $this->error('Please, run php artisan vendor:publish --tag=backend-config');

            return false; // Stop execution
        }

        $this->warn('Please, see the nbackend.php config file. everything setting up according to the file');

        if (in_array($modul_name, CommandName::COMMANDS)) {

            $module = Module::create(CommandName::SETUP);

            $this->process($module);

        } elseif (in_array($modul_name, CommandName::REVERSE_COMMANDS)) {

            $this->info('necessary command not yet functional');

        }

        return self::SUCCESS;
    }

    public function process($module)
    {
        //Af first running necessary command
        $this->info('First command running...');
        $this->runCommandFirst($module);

        //publishing the file
        $this->info('Publishing the necessary files...');
        $this->info($module->publish());

        //Content replace for the specefic file
        $this->info('Replacing the necessary files....\n');
        $this->info($module->contentReplace());

        //Content modify for the specefic file
        $this->info('Modifying the necessary files....\n');
        $this->info($module->contentModify());

        //Again finishing command running command
        $this->info('Second command running');
        $this->runCommandLast($module);

        $this->info('Done.🦾\n');

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

    protected function composerCommand($command)
    {
        $composer = $this->findComposer();
        $this->executeShellCommand("$composer $command --no-interaction --prefer-dist");

        // Run migrations
        $this->info('Success');
    }

    protected function artisanCommand($command)
    {
        $this->info("Running: php artisan $command ....");

        $this->executeShellCommand("php artisan $command");

    }

    protected function npmCommand($command): void
    {
        $composer = $this->findNpm();

        $this->executeShellCommand("$composer $command");

        $this->info('Success');

    }

    public function runCommandFirst($module)
    {

        if (! isset($module->commands_and_paths['commands'])) {
            $this->info('There are no command set to first priority');
        }

        foreach ($module->commands_and_paths['commands'] as $command) {

            if ($command['first']) {
                $function = $command['type'].'Command';
                $this->{$function}($command['code']);
            }
        }

        $this->info("The commands that's are first priority runned successfully");
    }

    public function runCommandLast($module)
    {

        if (! isset($module->commands_and_paths['commands'])) {
            $this->info('There are no command set to last priority');
        }
        foreach ($module->commands_and_paths['commands'] as $command) {

            if (! $command['first']) {
                $function = $command['type'].'Command';
                $this->{$function}($command['code']);
            }
        }

        $this->info("The commands that's are last priority runned successfully");
    }

    protected function executeShellCommand($command)
    {
        $process = Process::fromShellCommandline($command, null, null, null, null);
        $process->setTimeout(null); // No timeout

        $process->run(function ($type, $buffer) {
            $this->output->write($buffer);
        });

        if (! $process->isSuccessful()) {
            $this->error('The command failed.');

            return false;
        }

        return true;
    }

    public function reverseSetup()
    {
        (new AdminPanelSetup)->down();
    }
}
