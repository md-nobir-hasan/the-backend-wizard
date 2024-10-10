<?php

namespace Nobir\TheBackendWizard\HelperClass;

abstract class CommandName
{
    //Command assing to the module, every command does not has module. if module is assining to he command, the module nae same to
    // module foler name
    //vendor publish group/tag name will be backend-{module name}

    const SETUP = 'setup';

    const USERMANAGEMENT = 'user-management';

    const SIDEBAR_REFRESH = 'sidebar-refresh';

    const CLEAN = 'setup-reverse';
    const COMMANDS = ['setup'];
    const REVERSE_COMMANDS = ['reverse_setup'];

    public static function pakage_root_path($path = null): string
    {

        return dirname(__DIR__, 1).'/'.trim($path, '/');
    }

    public static function pakage_admin_path($path = null): string
    {

        return dirname(__DIR__, 2).'/admins/'.trim($path, '/');
    }

    public static function content_replace_path($command_name): string
    {
        $admin_name = config('nbackend.admin_name');

        return self::pakage_admin_path()."/$admin_name/$command_name/content-replace";
    }
}
