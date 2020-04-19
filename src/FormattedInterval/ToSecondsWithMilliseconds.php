<?php

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToSeconds as Seconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class ToSecondsWithMilliseconds
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): string
    {
        return
            bcdiv(
                (new ToMicroseconds($this->interval))->value(),
                1000000,
                3
            );
    }
}