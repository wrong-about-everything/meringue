<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\ISO8601Interval\WithFixedStartDateTime;

class CeiledMinutes
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return (int) ceil((new ToMinutes($this->interval))->value());
    }
}