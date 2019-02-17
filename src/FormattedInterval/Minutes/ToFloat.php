<?php

namespace Meringue\FormattedInterval\Minutes;

use Meringue\FormattedDateTime\ToSeconds;
use Meringue\WithFixedStartDateTime;

class ToFloat
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
                (new ToSeconds($this->interval->ends()))->value() - (new ToSeconds($this->interval->starts()))->value(),
                60,
                2
            );
    }
}