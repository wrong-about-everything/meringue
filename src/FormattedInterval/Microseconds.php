<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToMicroseconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class Microseconds
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return (new ToMicroseconds($this->interval->ends()))->value() - (new ToMicroseconds($this->interval->starts()))->value();
    }
}