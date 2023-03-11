<?php

namespace Creagia\FilamentCodeField;

use Creagia\FilamentCodeField\Concerns\Autocompletion;
use Creagia\FilamentCodeField\Concerns\ControlsHeight;
use Creagia\FilamentCodeField\Concerns\HasDisplayMode;
use Creagia\FilamentCodeField\Concerns\LineNumbers;
use Creagia\FilamentCodeField\Concerns\ProgrammingLanguages;
use Filament\Forms\Components\Field;

class CodeField extends Field
{
    use ProgrammingLanguages;
    use Autocompletion;
    use ControlsHeight;
    use HasDisplayMode;
    use LineNumbers;

    const PHP = 'php';

    const JS = 'javascript';

    const JSON = 'json';

    const HTML = 'html';

    const CSS = 'css';

    const XML = 'xml';

    const SQL = 'sql';

    protected string $view = 'filament-code-field::code-field';
}
