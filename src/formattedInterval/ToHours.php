<?php

namespace src\formattedInterval;

use src\formattedDateTime\ToSeconds;
use src\WithFixedStartDateTime;

class ToHours
{
    /**
     * @var WithFixedStartDateTime $interval
     */
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value()
    {
        return (int) (((new ToSeconds($this->interval->ends()))->value() - (new ToSeconds($this->interval->starts()))->value()) / 60 / 60);
    }
}