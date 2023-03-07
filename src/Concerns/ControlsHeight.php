<?php

namespace Creagia\FilamentCodeField\Concerns;

use Closure;

trait ControlsHeight
{
    protected string|Closure|null $maxHeight = null;

    protected string|Closure|null $minHeight = null;

    public function maxHeight(string|int $height): static
    {
        if (! is_string($height)) {
            $height .= 'px';
        }

        $this->maxHeight = $height;

        return $this;
    }

    public function getMaxHeight(): ?string
    {
        return $this->evaluate($this->maxHeight);
    }

    public function minHeight(string|int $height): static
    {
        if (! is_string($height)) {
            $height .= 'px';
        }

        $this->minHeight = $height;

        return $this;
    }

    public function getMinHeight(): ?string
    {
        return $this->evaluate($this->minHeight);
    }
}
