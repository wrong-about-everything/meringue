<?php

namespace Meringue\Timeline;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class Now implements ISO8601DateTime
{
    public function __construct()
    {
    }

    public function value(): string
    {
        return (new PHPDateTime('now'))->format('c');
    }

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return
            new PHPDateTime($this->value())
                ==
            new PHPDateTime($dateTime->value());
    }
}