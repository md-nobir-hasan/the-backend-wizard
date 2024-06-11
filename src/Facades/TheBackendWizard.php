<?php

namespace Nobir\TheBackendWizard\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nobir\TheBackendWizard\TheBackendWizard
 */
class TheBackendWizard extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Nobir\TheBackendWizard\TheBackendWizard::class;
    }
}
