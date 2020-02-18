# Laravel Notification Methods

[![Latest Version](https://badgen.net/packagist/v/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)
[![Software License](https://badgen.net/packagist/license/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)
[![Build Status](https://img.shields.io/github/workflow/status/kodekeep/laravel-notification-methods/run-tests?label=tests)](https://github.com/kodekeep/laravel-notification-methods/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Coverage Status](https://badgen.net/codeclimate/coverage/kodekeep/laravel-notification-methods)](https://codeclimate.com/github/kodekeep/laravel-notification-methods)
[![Quality Score](https://badgen.net/codeclimate/maintainability/kodekeep/laravel-notification-methods)](https://codeclimate.com/github/kodekeep/laravel-notification-methods)
[![Total Downloads](https://badgen.net/packagist/dt/kodekeep/laravel-notification-methods)](https://packagist.org/packages/kodekeep/laravel-notification-methods)

This package was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and provides Notification Methods for Laravel Eloquent Models.

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

## Support Us

We invest a lot of resources into creating and maintaining our packages. You can support us and the development through [GitHub Sponsors](https://github.com/sponsors/faustbrian).

## License

Laravel Notification Methods is an open-sourced software licensed under the [MPL-2.0](LICENSE.md).
