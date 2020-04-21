<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\SecondsSinceJanuary1st1970 as Seconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalFullSeconds
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return
            (int) floor(
                bcsub(
                    (new Seconds($this->interval->ends()))->value(),
                    (new Seconds($this->interval->starts()))->value()
                )
            );
    }
}