<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToMicroseconds as Microseconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class ToMilliseconds
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return
            (int) bcdiv(
                bcsub(
                    (string) (new Microseconds($this->interval->ends()))->value(),
                    (string) (new Microseconds($this->interval->starts()))->value()
                ),
                '1000',
                0
            );
    }
}