<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\ISO8601Interval\WithFixedStartDateTime;

class FullMinutes
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return (int) floor((new ToMinutes($this->interval))->value());
    }
}