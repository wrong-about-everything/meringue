<?php

declare(strict_types=1);

namespace Meringue\WeekDay;

use Meringue\FormattedDateTime\SecondsSinceJanuary1st1970;
use Meringue\ISO8601DateTime;
use Meringue\WeekDay;

/**
 * Also check LocalDayOfWeek out, as well as LocalDayOfWeekTest.
 */
class DayOfWeekInUTC extends WeekDay
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
    public function value(): int
    {
        return (int) strftime('%u', (int) (new SecondsSinceJanuary1st1970($this->dt))->value());
    }
}
