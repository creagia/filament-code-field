<?php

namespace Creagia\FilamentJsonField;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentJsonFieldServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-json-field';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-filament-json-field' => __DIR__.'/../resources/dist/filament-json-field.css',
    ];

    protected array $scripts = [
        'plugin-filament-json-field' => __DIR__.'/../resources/dist/filament-json-field.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-filament-json-field' => __DIR__ . '/../resources/dist/filament-json-field.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
