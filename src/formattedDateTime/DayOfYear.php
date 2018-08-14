<?php

namespace src\formattedDateTime;

use src\ISO8601DateTime;

class DayOfYear
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value()
    {
        return strftime('%j', (new ToSeconds($this->dt))->value());
    }
}