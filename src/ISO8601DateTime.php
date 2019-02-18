<?php

namespace Meringue;

use DateTimeImmutable as PHPDateTime;

abstract class ISO8601DateTime
{
    abstract public function value(): string;

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }
}
