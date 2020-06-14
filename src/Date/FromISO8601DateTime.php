<?php

declare(strict_types=1);

namespace Meringue\Date;

use Meringue\Date;
use Meringue\Date\Day\FromISO8601DateTime as Day;
use Meringue\Date\Month\FromISO8601DateTime as Months;
use Meringue\Date\Year\FromISO8601DateTime as Years;
use Meringue\ISO8601DateTime;

class FromISO8601DateTime extends Date
{
    private $d;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->d = new DefaultDate(new Years($dateTime), new Months($dateTime), new Day($dateTime));
    }

    public function value(): string
    {
        return $this->d->value();
    }
}