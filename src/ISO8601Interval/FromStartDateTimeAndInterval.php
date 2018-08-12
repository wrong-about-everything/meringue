<?php

namespace src\ISO8601Interval;

use DateTimeImmutable as PHPDateTime;
use src\ISO8601DateTime;
use src\ISO8601Interval;
use src\timeline\Future;
use src\WithFixedStartDateTime;

class FromStartDateTimeAndInterval implements WithFixedStartDateTime
{
    private $dt;
    private $dti;

    public function __construct(ISO8601DateTime $dt, ISO8601Interval $dti)
    {
        $this->dt = $dt;
        $this->dti = $dti;
    }

    public function starts(): ISO8601DateTime
    {
        return $this->dt;
    }

    public function ends(): ISO8601DateTime
    {
        return new Future($this->dt, $this->dti);
    }

    public function value(): string
    {
        return $this->dti->value();
    }
}