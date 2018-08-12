<?php

namespace src\timeline;

use DateInterval as PHPDateInterval;
use DateTimeImmutable as PHPDateTime;
use src\ISO8601DateTime;
use src\ISO8601Interval;

class Past implements ISO8601DateTime
{
    private $dt;
    private $i;

    public function __construct(ISO8601DateTime $dt, ISO8601Interval $i)
    {
        $this->dt = $dt;
        $this->i = $i;
    }

    public function value(): string
    {
        return
            (new PHPDateTime(
                $this->dt->value()
            ))
                ->sub(
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