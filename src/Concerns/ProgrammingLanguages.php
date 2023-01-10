<?php

namespace Creagia\FilamentCodeField\Concerns;

use Creagia\FilamentCodeField\CodeField;

trait ProgrammingLanguages
{
    public string $language = CodeField::JSON;

    public function setLanguage(string $language): static
    {
        $language = strtolower($language);

        if (! in_array($language, self::availableLanguages())) {
            $language = CodeField::JSON;
        }

        $this->language = strtolower($language);

        return $this;
    }

    public function phpField(): static
    {
        return $this->setLanguage(CodeField::PHP);
    }

    public function jsField(): static
    {
        return $this->setLanguage(CodeField::JS);
    }

    public function jsonField(): static
    {
        return $this->setLanguage(CodeField::JSON);
    }

    public function htmlField(): static
    {
        return $this->setLanguage(CodeField::HTML);
    }

    public function cssField(): static
    {
        return $this->setLanguage(CodeField::CSS);
    }

    public function xmlField(): static
    {
        return $this->setLanguage(CodeField::XML);
    }

    public function sqlField(): static
    {
        return $this->setLanguage(CodeField::SQL);
    }

    public static function availableLanguages(): array
    {
        return [
            CodeField::PHP,
            CodeField::JS,
            CodeField::JSON,
            CodeField::HTML,
            CodeField::CSS,
            CodeField::XML,
            CodeField::SQL,
        ];
    }
}
