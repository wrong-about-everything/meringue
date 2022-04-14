<?php

declare(strict_types=1);

namespace Meringue\WeekDay;

use Meringue\FormattedDateTime\ISO8601Formatted;
use Meringue\ISO8601DateTime;
use Meringue\WeekDay;

/**
 * Day of week in a $dateTime's timezone.
 * Also check DayOfWeekInUTC out, as well as DayOfWeekInUTCTest.
 */
class LocalDayOfWeek extends WeekDay
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): int
    {
        return (int) (new ISO8601Formatted($this->dt, 'N'))->value();
    }
}
