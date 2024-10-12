<?php

namespace Nobir\TheBackendWizard\HelperClass;

abstract class CommandName
{
    //Command assing to the module, every command does not has module. if module is assining to he command, the module name same to
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

    public static function module_path($command_name): string
    {
        $admin_name = config('nbackend.admin_name');
        $with_or_without_role_path = self::role_permission_path_or_not();

        return self::pakage_admin_path()."/$admin_name/$command_name/$with_or_without_role_path";
    }

    public static function content_replace_path($command_name): string
    {
        return self::module_path($command_name).'/content-replace';
    }

    public static function content_modify_path($command_name): string
    {
        return self::module_path($command_name).'/content-modify';
    }

    public static function publish_path($command_name): string
    {
        return self::module_path($command_name).'/publish';
    }

    public static function role_permission_path_or_not(): string
    {
        return config('nbackend.role_permission') ? 'with-role-permission' : 'without-role-permission';
    }

    public static function with_or_without_role_permission_key(): string
    {
        return str_replace('-', '_', self::role_permission_path_or_not());
    }
}
