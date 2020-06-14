<?php

declare(strict_types=1);

namespace Meringue\Time;

use Meringue\ISO8601DateTime;
use Meringue\Time;
use Meringue\Time\Hour\FromISO8601DateTime as Hours;
use Meringue\Time\Minute\FromISO8601DateTime as Minutes;
use Meringue\Time\Second\FromISO8601DateTime as Seconds;

class FromISO8601DateTime extends Time
{
    private $time;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->time = new DefaultTime(new Hours($dateTime), new Minutes($dateTime), new Seconds($dateTime));
    }

    public function value(): string
    {
        return $this->time->value();
    }
}