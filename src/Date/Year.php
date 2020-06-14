<?php

declare(strict_types=1);

namespace Meringue\Date;

abstract class Year
{
    abstract public function value(): int;

    public function equals(Year $year): bool
    {
        return $this->value() === $year->value();
    }

    public function greaterThan(Year $year): bool
    {
        return $this->value() > $year->value();
    }

    public function lessThan(Year $year): bool
    {
        return $this->value() < $year->value();
    }
}