<?php

namespace Creagia\FilamentCodeField;

use Filament\PluginServiceProvider;

class FilamentCodeFieldServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-code-field';

    protected array $styles = [
        'filament-code-field-styles' => __DIR__.'/../resources/dist/filament-code-field.css',
    ];

    protected array $beforeCoreScripts = [
        'filament-code-field-scripts' => __DIR__.'/../resources/dist/filament-code-field.js',
    ];
}
