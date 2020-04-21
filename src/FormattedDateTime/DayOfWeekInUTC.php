<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;

/**
 * Also check LocalDayOfWeek out, as well as LocalDayOfWeekTest.
 */
class DayOfWeekInUTC
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
        return strftime('%u', (int) (new SecondsSinceJanuary1st1970($this->dt))->value());
    }

    public function fullName()
    {
        return strftime('%A', (int) (new SecondsSinceJanuary1st1970($this->dt))->value());
    }

    public function abbreviated()
    {
        return strftime('%a', (int) (new SecondsSinceJanuary1st1970($this->dt))->value());
    }
}
