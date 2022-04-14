<?php

declare(strict_types=1);

namespace Meringue;

abstract class WeekDay
{
    /**
     * ISO-8601 numeric representation of the day of the week.
     * 1 for Monday, 7 for Sunday.
     */
    abstract public function value(): int;

    public function equal(WeekDay $weekDay)
    {
        return $this->value() === $weekDay->value();
    }
}
