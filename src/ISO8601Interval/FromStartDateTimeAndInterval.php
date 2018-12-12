<?php

namespace Meringue\ISO8601Interval;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval;
use Meringue\Timeline\Future;
use Meringue\WithFixedStartDateTime;

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