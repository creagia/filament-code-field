# Filamentphp code field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creagia/filament-code-field.svg?style=flat-square)](https://packagist.org/packages/creagia/filament-code-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/creagia/filament-code-field/run-tests.yml?label=tests)](https://github.com/creagia/filament-code-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/creagia/filament-code-field/fix-php-code-style-issues.yml?label=code%20style)](https://github.com/creagia/filament-code-field/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/creagia/filament-code-field.svg?style=flat-square)](https://packagist.org/packages/creagia/filament-code-field)

A [CodeMirror](https://codemirror.net/) powered code field for the Filamentphp admin panel and form builder.

With code autocompletion, light/dark modes, multiple languages, read-only mode and more.

Check screenshots and read more about the package in our [blog post](https://creagia.com/blog/a-code-field-for-the-filamentphp-admin-panel-and-form-builder).

## Installation

You can install the package via composer:

```bash
composer require creagia/filament-code-field
```

## Usage

Creating a code field is straightforward, just instantiate the `CodeField` class for the desired property.

```php
use Creagia\FilamentCodeField\CodeField;

return $form
    ->schema([
        CodeField::make('my_json'),
        // other fields
    ]);
```

### Choosing another language

By default, a JSON field will be created. 

If you want to create a field for another supported language, you can do so with the `setLanguage()` and helper methods.

Supported languages: JSON, PHP, HTML, XML and JavaScript (JS).

```php
use Creagia\FilamentCodeField\CodeField;

return $form
    ->schema([
        CodeField::make('js_code')
            ->setLanguage(CodeField::JS),
            // or
            ->jsField()
    ]);
```

### Disabling code completion

By default, the field comes with code completion/suggestions enabled.

For disabling this feature, use the `disableAutocompletion()`.

```php
use Creagia\FilamentCodeField\CodeField;

return $form
    ->schema([
        CodeField::make('js_code')
            ->htmlField()
            ->disableAutocompletion(),
    ]);
```

### Line numbers

Line numbers can be enabled using the `withLineNumbers()` method.

```php
use Creagia\FilamentCodeField\CodeField;

return $form
    ->schema([
        CodeField::make('json')
            ->withLineNumbers(),
    ]);
```

### Read-only mode

Adding the Filamentphp `disabled()` method will make the code field read-only.

```php
use Creagia\FilamentCodeField\CodeField;

return $form
    ->schema([
        CodeField::make('json')
            ->disabled(),
    ]);
```

### Filamentphp methods

Of course, the code field extends the `Filamentphp` field class, and you can use all the usual methods such as `label()`.

```php
use Creagia\FilamentCodeField\CodeField;

return $form
    ->schema([
        CodeField::make('json')
            ->label('Your JSON data')
            ->hint('Top right corner info')
            ->helper('More info after the text field')
            // more methods
            ,
    ]);
```

