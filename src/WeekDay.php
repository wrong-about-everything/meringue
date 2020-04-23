<?php

declare(strict_types=1);

namespace Meringue;

abstract class WeekDay
{
    abstract public function value(): int;

    public function equal(WeekDay $weekDay)
    {
        return $this->value() === $weekDay->value();
    }
}
