<?php

declare(strict_types=1);

namespace Meringue\WeekDay;

use Meringue\FormattedDateTime\ISO8601Formatted;
use Meringue\ISO8601DateTime;
use Meringue\WeekDay;

class Saturday extends WeekDay
{
    /**
     * ISO-8601 numeric representation of the day of the week.
     * 1 for Monday, 7 for Sunday.
     * @return int
     */
    public function value(): int
    {
        return 6;
    }
}
