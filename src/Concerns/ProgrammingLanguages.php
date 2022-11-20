<?php

namespace Creagia\FilamentCodeField\Concerns;

trait ProgrammingLanguages
{
    public string $language = 'json';

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function jsonField(): static
    {
        return $this->setLanguage('json');
    }

    public function cssField(): static
    {
        return $this->setLanguage('css');
    }

    public function htmlField(): static
    {
        return $this->setLanguage('html');
    }

    public function jsField(): static
    {
        return $this->setLanguage('javascript');
    }

    public function xmlField(): static
    {
        return $this->setLanguage('xml');
    }
}
