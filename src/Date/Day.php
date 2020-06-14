<?php

declare(strict_types=1);

namespace Meringue\Date;

abstract class Day
{
    abstract public function value(): int;

    public function equals(Day $month): bool
    {
        return $this->value() === $month->value();
    }

    public function greaterThan(Day $month): bool
    {
        return $this->value() > $month->value();
    }

    public function lessThan(Day $month): bool
    {
        return $this->value() < $month->value();
    }
}