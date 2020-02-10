# Laravel Notification Methods

[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kodekeep/laravel-notification-methods/run-tests?label=tests)](https://github.com/kodekeep/laravel-notification-methods/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Code Coverage](https://badgen.now.sh/codecov/c/github/kodekeep/laravel-notification-methods)](https://codecov.io/gh/kodekeep/laravel-notification-methods)
[![Minimum PHP Version](https://badgen.net/packagist/php/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)
[![Latest Version](https://badgen.net/packagist/v/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)
[![Total Downloads](https://badgen.net/packagist/dt/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)
[![License](https://badgen.net/packagist/license/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)

> Notification Methods for Eloquent Models.

## Installation

```bash
composer require kodekeep/laravel-notification-methods
```

## Usage

### Add the trait

``` php
class User extends Model
{
    use HasNotificationMethods;
}
```

``` php
$user->notificationMethods()->create([
    'name'        => 'My Channel',
    'channel'     => 'discord',
    'discord_url' => 'https://google.com',
]);
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@kodekeep.com. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 (MPL-2.0). Please see [License File](LICENSE.md) for more information.
