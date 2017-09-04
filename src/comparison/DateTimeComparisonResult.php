<?php

namespace ooDateTime\src\comparison;

use DateTimeImmutable as PHPDateTime;
use ooDateTime\src\ISO8601DateTime;

class DateTimeComparisonResult
{
    private $d1;
    private $d2;

    public function __construct(ISO8601DateTime $d1, ISO8601DateTime $d2)
    {
        $this->d1 = $d1;
        $this->d2 = $d2;
    }

    public function areEqual()
    {
        return new PHPDateTime($this->d1->value()) == new PHPDateTime($this->d2->value());
    }

    public function firstOneIsGreater()
    {
        return new PHPDateTime($this->d1->value()) > new PHPDateTime($this->d2->value());
    }

    public function secondOneIsGreater()
    {
        return new PHPDateTime($this->d1->value()) < new PHPDateTime($this->d2->value());
    }
}