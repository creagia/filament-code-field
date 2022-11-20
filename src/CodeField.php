<?php

namespace Creagia\FilamentCodeField;

use Creagia\FilamentCodeField\Concerns\Autocompletion;
use Creagia\FilamentCodeField\Concerns\LineNumbers;
use Creagia\FilamentCodeField\Concerns\ProgrammingLanguages;
use Filament\Forms\Components\Field;

class CodeField extends Field
{
    use ProgrammingLanguages;
    use Autocompletion;
    use LineNumbers;

    protected string $view = 'filament-code-field::code-field';
}
