<?php

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToMicroseconds as Microseconds;
use Meringue\WithFixedStartDateTime;

class ToMicroseconds
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): string
    {
        return
            bcsub(
                (new Microseconds($this->interval->ends()))->value(),
                (new Microseconds($this->interval->starts()))->value()
            );
    }
}