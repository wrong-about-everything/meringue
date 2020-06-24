<?php

declare(strict_types=1);

namespace Meringue\Date;

abstract class Day
{
    abstract public function value(): int;

    public function equals(Day $day): bool
    {
        return $this->value() === $day->value();
    }

    public function greaterThan(Day $day): bool
    {
        return $this->value() > $day->value();
    }

    public function lessThan(Day $day): bool
    {
        return $this->value() < $day->value();
    }
}