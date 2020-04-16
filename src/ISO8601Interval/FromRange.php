<?php

namespace Meringue\ISO8601Interval;

use DateTimeImmutable as PHPDateTime;
use Exception;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval;
use Meringue\WithFixedStartDateTime;

class FromRange extends ISO8601Interval implements WithFixedStartDateTime
{
    private $dt1;
    private $dt2;

    public function __construct(ISO8601DateTime $dt1, ISO8601DateTime $dt2)
    {
        if (new PHPDateTime($dt2->value()) <= new PHPDateTime($dt1->value())) {
            throw new Exception('Interval end date can not be less than start date.');
        }

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
        return
            (new PHPDateTime($this->dt2->value()))
                ->diff(
                    new PHPDateTime($this->dt1->value())
                )
                    ->format("P%yY%mM%dDT%hH%iM%sS")
            ;
    }
}