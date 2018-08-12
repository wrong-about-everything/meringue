<?php

namespace src\ISO8601Interval;

use DateTimeImmutable as PHPDateTime;
use Exception;
use src\ISO8601DateTime;
use src\WithFixedStartDateTime;

class FromRange implements WithFixedStartDateTime
{
    private $dt1;
    private $dt2;

    public function __construct(ISO8601DateTime $dt1, ISO8601DateTime $dt2)
    {
        $this->dt1 = $dt1;
        $this->dt2 = $dt2;
    }

    public function starts(): ISO8601DateTime
    {
        return $this->dt1;
    }

    public function ends(): ISO8601DateTime
    {
        return $this->dt2;
    }

    public function value(): string
    {
        if ($this->dt2->value() < $this->dt1->value()) {
            throw new Exception('Interval end date can not be less than start date.');
        }

        return
            (new PHPDateTime($this->dt2->value()))
                ->diff(
                    new PHPDateTime($this->dt1->value())
                )
                    ->format("P%yY%mM%dDT%hH%iM%sS")
            ;
    }
}