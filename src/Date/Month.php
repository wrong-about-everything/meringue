<?php

declare(strict_types=1);

namespace Meringue\Date;

abstract class Month
{
    abstract public function value(): int;

    public function equals(Month $month): bool
    {
        return $this->value() === $month->value();
    }

    public function greaterThan(Month $month): bool
    {
        return $this->value() > $month->value();
    }

    public function lessThan(Month $month): bool
    {
        return $this->value() < $month->value();
    }
}