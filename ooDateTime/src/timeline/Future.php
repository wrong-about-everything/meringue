<?php

namespace ooDateTime\src\timeline;

use DateInterval as PHPDateInterval;
use DateTimeImmutable as PHPDateTime;
use ooDateTime\src\ISO8601Interval;
use ooDateTime\src\ISO8601DateTime;

class Future implements ISO8601DateTime
{
    private $dt;
    private $i;

    public function __construct(ISO8601DateTime $dt, ISO8601Interval $i)
    {
        $this->dt = $dt;
        $this->i = $i;
    }

    public function value()
    {
        return
            (new PHPDateTime($this->dt->value()))
                ->add(
                    new PHPDateInterval($this->i->value())
                )
                ->format('c');
    }

    public function equalsTo(ISO8601DateTime $dateTime)
    {
        return
            new PHPDateTime($this->value())
                ==
            new PHPDateTime($dateTime->value());
    }
}