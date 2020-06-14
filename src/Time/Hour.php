<?php

declare(strict_types=1);

namespace Meringue\Time;

abstract class Hour
{
    abstract public function value(): int;

    public function equals(Hour $hour): bool
    {
        return $this->value() === $hour->value();
    }

    public function greaterThan(Hour $hour): bool
    {
        return $this->value() > $hour->value();
    }

    public function lessThan(Hour $hour): bool
    {
        return $this->value() < $hour->value();
    }
}
