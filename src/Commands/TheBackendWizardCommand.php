<?php

namespace Nobir\TheBackendWizard\Commands;

use Illuminate\Console\Command;

class TheBackendWizardCommand extends Command
{
    public $signature = 'the-backend-wizard';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
