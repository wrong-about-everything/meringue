<?php

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;

class DayOfWeekInUTC
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    /**
     * ISO-8601 numeric representation of the day of the week.
     * @return string
     */
    public function numeric()
    {
        return strftime('%u', (new ToSeconds($this->dt))->value());
    }

    public function fullName()
    {
        return strftime('%A', (new ToSeconds($this->dt))->value());
    }

    public function abbreviated()
    {
        return strftime('%a', (new ToSeconds($this->dt))->value());
    }
}
