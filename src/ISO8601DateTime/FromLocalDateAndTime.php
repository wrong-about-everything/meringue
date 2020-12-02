<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\Date;
use Meringue\ISO8601DateTime;
use DateTimeImmutable;
use Meringue\Time;

class FromLocalDateAndTime extends ISO8601DateTime
{
    private $date;
    private $time;
    private $timezone;

    public function __construct(Date $date, Time $time, TimeZone $timezone)
    {
        $this->date = $date;
        $this->time = $time;
        $this->timezone = $timezone;
    }

    public function value(): string
    {
        return
            (new FromPhpDateTime(
                new DateTimeImmutable(
                    $this->date->value() . 'T' . $this->time->value() . $this->timezone->value()
                )
            ))
                ->value()
            ;
    }
}
