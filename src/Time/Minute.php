<?php

declare(strict_types=1);

namespace Meringue\Time;

abstract class Minute
{
    abstract public function value(): int;

    public function equals(Minute $minute): bool
    {
        return $this->value() === $minute->value();
    }

    public function greaterThan(Minute $minute): bool
    {
        return $this->value() > $minute->value();
    }

    public function lessThan(Minute $minute): bool
    {
        return $this->value() < $minute->value();
    }
}
