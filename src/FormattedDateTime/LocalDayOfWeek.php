<?php

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;

/**
 * Also check DayOfWeekInUTC out, as well as DayOfWeekInUTCTest.
 */
class LocalDayOfWeek
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    /**
     * ISO-8601 numeric representation of the day of the week.
     * 1 for Monday, 7 for Sunday.
     * @return string
     */
    public function numeric()
    {
        return (new InCustomFormat($this->dt, 'N'))->value();
    }

    public function fullName()
    {
        return (new InCustomFormat($this->dt, 'N'))->value();;
    }

    public function abbreviated()
    {
        return (new InCustomFormat($this->dt, 'N'))->value();;
    }
}
