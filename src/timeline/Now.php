<?php

namespace src\timeline;

use DateTimeImmutable as PHPDateTime;
use src\ISO8601DateTime;

class Now implements ISO8601DateTime
{
    public function __construct()
    {
    }

    public function value(): string
    {
        return (new PHPDateTime('now'))->format('c');
    }

    public function equalsTo(ISO8601DateTime $dateTime)
    {
        return
            new PHPDateTime($this->value())
                ==
            new PHPDateTime($dateTime->value());
    }
}