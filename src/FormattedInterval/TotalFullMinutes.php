<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\SecondsSinceJanuary1st1970;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalFullMinutes
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return (int) floor(((new SecondsSinceJanuary1st1970($this->interval->ends()))->value() - (new SecondsSinceJanuary1st1970($this->interval->starts()))->value()) / 60);
    }
}