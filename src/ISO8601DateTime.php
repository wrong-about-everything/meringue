<?php

namespace Meringue;

use DateTimeImmutable as PHPDateTime;

abstract class ISO8601DateTime
{
    /**
     * @return string Date time in canonicalized ISO8601 format.
     * E.g., 2014-11-21T07:01:05+07:30 or with microseconds, when possible: 2014-11-21T07:01:05.324853+07:30
     */
    abstract public function value(): string;

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }

    public function laterThan(ISO8601DateTime $dateTime): bool
    {
        return
            new PHPDateTime(
                $this->value()
            )
                >
            new PHPDateTime(
                $dateTime->value()
            );
    }

    public function earlierThan(ISO8601DateTime $dateTime): bool
    {
        return !$this->equalsTo($dateTime) && !$this->laterThan($dateTime);
    }
}
