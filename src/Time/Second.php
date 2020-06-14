<?php

declare(strict_types=1);

namespace Meringue\Time;

abstract class Second
{
    abstract public function value(): int;

    public function equals(Second $second): bool
    {
        return $this->value() === $second->value();
    }

    public function greaterThan(Second $second): bool
    {
        return $this->value() > $second->value();
    }

    public function lessThan(Second $second): bool
    {
        return $this->value() < $second->value();
    }
}
