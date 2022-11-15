# This is my package filament-json-field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creagia/filament-json-field.svg?style=flat-square)](https://packagist.org/packages/creagia/filament-json-field)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/creagia/filament-json-field/run-tests?label=tests)](https://github.com/creagia/filament-json-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/creagia/filament-json-field/Check%20&%20fix%20styling?label=code%20style)](https://github.com/creagia/filament-json-field/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/creagia/filament-json-field.svg?style=flat-square)](https://packagist.org/packages/creagia/filament-json-field)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require creagia/filament-json-field
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-json-field-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-json-field-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-json-field-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-json-field = new Creagia\FilamentJsonField();
echo $filament-json-field->echoPhrase('Hello, Creagia!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Creagia](https://github.com/creagia)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
