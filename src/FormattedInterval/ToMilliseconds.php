<?php

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToMicroseconds as Microseconds;
use Meringue\WithFixedStartDateTime;

class ToMilliseconds
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
                bcsub(
                    (new Microseconds($this->interval->ends()))->value(),
                    (new Microseconds($this->interval->starts()))->value()
                ),
                1000,
                0
            );
    }
}