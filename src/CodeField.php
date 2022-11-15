<?php

namespace Creagia\FilamentCodeField;

use Creagia\FilamentCodeField\Concerns\WithProgrammingLanguages;
use Filament\Forms\Components\Field;

class CodeField extends Field
{
    use WithProgrammingLanguages;

    protected string $view = 'filament-code-field::code-field';

    public bool $lineNumbers = false;

    public bool $autocompletion = true;

    public function withLineNumbers(): static
    {
        $this->lineNumbers = true;

        return $this;
    }

    public function disableAutocompletion(): static
    {
        $this->autocompletion = false;

        return $this;
    }
}
