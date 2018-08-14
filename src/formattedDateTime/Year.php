<?php

namespace src\formattedDateTime;

use src\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class Year
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function full()
    {
        return (new PHPDateTime($this->dt->value()))->format('Y');
    }

    public function twoLastDigits()
    {
        return strftime('%y', (new ToSeconds($this->dt))->value());
    }

    public function isLeap()
    {
        return (int) ((new PHPDateTime($this->dt->value()))->format('L')) === 1;
    }
}