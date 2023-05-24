<?php

namespace Creagia\FilamentCodeField;

use Filament\Support\Assets\AssetManager;
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
        $package
            ->name(static::$name)
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->app->resolving(AssetManager::class, function () {
            FilamentAsset::register($this->getAssets(), static::$name);
        });
    }

    protected function getAssets(): array
    {
        return [
            Css::make('filament-code-field-styles', __DIR__.'/../resources/dist/filament-code-field.css'),
            Js::make('filament-code-field-scripts', __DIR__.'/../resources/dist/filament-code-field.js'),
        ];
    }
}
