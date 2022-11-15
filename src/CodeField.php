<?php

namespace Creagia\FilamentCodeField;

use Filament\Forms\Components\Field;

class CodeField extends Field
{
    protected string $view = 'filament-code-field::code-field';

    public string $language = 'json';

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function css(): static
    {
        return $this->setLanguage('css');
    }

    public function html(): static
    {
        return $this->setLanguage('html');
    }

    public function js(): static
    {
        return $this->setLanguage('javascript');
    }

    public function xml(): static
    {
        return $this->setLanguage('xml');
    }

    public function markdown(): static
    {
        return $this->setLanguage('markdown');
    }
}
