<?php

namespace Creagia\FilamentJsonField;

use Filament\PluginServiceProvider;

class FilamentJsonFieldServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-json-field';

    protected array $styles = [
        'filament-json-field-styles' => __DIR__.'/../resources/dist/filament-json-field.css',
    ];

    protected array $beforeCoreScripts = [
        'filament-json-field-scripts' => __DIR__.'/../resources/dist/filament-json-field.js',
    ];
}
