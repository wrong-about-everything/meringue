<?php

namespace src\formattedDateTime;

use src\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class Month
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function numeric()
    {
        return (new PHPDateTime($this->dt->value()))->format('m');
    }

    public function fullName()
    {
        return strftime('%B', (new ToSeconds($this->dt))->value());
    }

    public function abbreviated()
    {
        return strftime('%b', (new ToSeconds($this->dt))->value());
    }
}