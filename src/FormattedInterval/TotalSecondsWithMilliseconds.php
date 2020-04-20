<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalSecondsWithMilliseconds
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
                (string) (new TotalMicroseconds($this->interval))->value(),
                '1000000',
                3
            );
    }
}