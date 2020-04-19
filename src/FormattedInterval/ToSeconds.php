<?php

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToSeconds as Seconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class ToSeconds
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
                (new Seconds($this->interval->ends()))->value(),
                (new Seconds($this->interval->starts()))->value()
            );
    }
}