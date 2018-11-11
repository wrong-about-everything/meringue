<?php

namespace src\formattedDateTime;

use src\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class InCustomFormat
{
    private $dt;
    private $format;

    public function __construct(ISO8601DateTime $dateTime, $format)
    {
        $this->dt = $dateTime;
        $this->format = $format;
    }

    public function value()
    {
        return (new PHPDateTime($this->dt->value()))->format($this->format);
    }
}