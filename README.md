# This pakage is really a wizard, you can create your admin panel as your need with raw codding. really amaging

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nobir/the-backend-wizard.svg?style=flat-square)](https://packagist.org/packages/nobir/the-backend-wizard)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/nobir/the-backend-wizard/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/nobir/the-backend-wizard/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/nobir/the-backend-wizard/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/nobir/the-backend-wizard/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nobir/the-backend-wizard.svg?style=flat-square)](https://packagist.org/packages/nobir/the-backend-wizard)

This pakage is usefull when you want to store and use again and again a admin panel. ..

# Rules to setup a module for a specific admin panel

Diagram: command register => adding specefic files => define their location
SN: Remember, when you change anything you may change this in two place. with role permission, without role permission.

### Command register: in CommandName file -

1. in commands array
2. make a constant property and assign the same command.

### adding files: in admins folders -

1. folder with admin name
2. folder with command name
3. two folder - with-role-permission and without-role-permission.
4. final location - Here setup all file according to their folder

### Define Location:

1. find the filelocation file.
2. here there are array with the admin name. and the array structure according to the above folder : admn name => command name => with-role-permission, without-role-permission folder => final location

At last run the command and see the magic.

3. two folder - with-role-permission and without-role-permission.
4. final locatin - Here setup all file according to their folder

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/the-backend-wizard.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/the-backend-wizard)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require nobir/the-backend-wizard
```

Publish the config file with:

```bash
php artisan vendor:publish --tag="backend-config"
```

This is the contents of the published config file:

```php
return [

    /**  Available admins are :-
     *
     * taildash,
     *
     * upcoming more
     */
    'admin_name' => 'taildash',

    /**
     * code slightly change in case of role permission
     *HEre you can set role permission is set or not to the admin panel
     */
    'role_permission' => true,
];
```

## Usage

At first set up a admin panel:

```bash
php artisan nobir:backend setup
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Md. Nobir Hasan](https://github.com/nobir-hasan)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
