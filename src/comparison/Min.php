<?php

namespace src\comparison;

use DateTimeImmutable as PHPDateTime;
use src\ISO8601DateTime;

class Min implements ISO8601DateTime
{
    private $datetime1;
    private $datetime2;

    public function __construct(ISO8601DateTime $dateTime1, ISO8601DateTime $dateTime2)
    {
        $this->datetime1 = $dateTime1;
        $this->datetime2 = $dateTime2;
    }

    public function value(): string
    {
        return
            (new PHPDateTime($this->datetime1->value()) < new PHPDateTime($this->datetime2->value()))
                ? $this->datetime1->value()
                : $this->datetime2->value()
            ;
    }

    public function equalsTo(ISO8601DateTime $dateTime)
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }
}