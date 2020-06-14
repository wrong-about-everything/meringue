<?php

declare(strict_types=1);

namespace Meringue\Time;

use Meringue\Time;

class DefaultTime extends Time
{
    private $hours;
    private $minutes;
    private $seconds;

    public function __construct(Hour $hours, Minute $minutes, Second $seconds)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    public function value(): string
    {
        return sprintf('%02d:%02d:%02d', $this->hours->value(), $this->minutes->value(), $this->seconds->value());
    }
}