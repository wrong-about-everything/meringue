<?php

namespace Meringue\Timeline;

use DateInterval as PHPDateInterval;
use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601Interval;
use Meringue\ISO8601DateTime;

class Future extends ISO8601DateTime
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
        $from = new PHPDateTime($this->dt->value());

        if ((int) $from->format('u') != 0) {
            return
                $from
                    ->add(
                        new PHPDateInterval($this->i->value())
                    )
                        ->format('Y-m-d\TH:i:s.uP')
                ;
        }

        return
            $from
                ->add(
                    new PHPDateInterval($this->i->value())
                )
                    ->format('c')
            ;
    }
}