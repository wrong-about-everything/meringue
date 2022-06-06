<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

abstract class Type
{
    abstract public function value(): int;

    public function equals(Type $type)
    {
        return $this->value() === $type->value();
    }
}