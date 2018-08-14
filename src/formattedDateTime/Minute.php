<?php

namespace src\formattedDateTime;

use src\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class Minute
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value()
    {
        return (new PHPDateTime($this->dt->value()))->format('i');
    }
}