<?php

namespace Creagia\FilamentCodeField;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCodeFieldServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-code-field';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make(static::$name, __DIR__.'/../resources/dist/filament-code-field.css'),
            Js::make(static::$name, __DIR__.'/../resources/dist/filament-code-field.js'),
        ], 'creagia/filament-code-field');
    }
}
