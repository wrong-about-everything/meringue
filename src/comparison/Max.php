<?php

namespace ooDateTime\src\comparison;

use DateTimeImmutable as PHPDateTime;
use ooDateTime\src\ISO8601DateTime;

class Max implements ISO8601DateTime
{
    private $datetime1;
    private $datetime2;

    public function __construct(ISO8601DateTime $dateTime1, ISO8601DateTime $dateTime2)
    {
        $this->datetime1 = $dateTime1;
        $this->datetime2 = $dateTime2;
    }

    public function value()
    {
        return
            (new PHPDateTime($this->datetime1->value()) > new PHPDateTime($this->datetime2->value()))
                ? $this->datetime1
                : $this->datetime2
            ;
    }

    public function equalsTo(ISO8601DateTime $dateTime)
    {
        return new PHPDateTime($this->value()->value()) == new PHPDateTime($dateTime->value());
    }
}