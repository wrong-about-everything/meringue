<?php

declare(strict_types=1);

namespace Meringue\Time;

use Exception;
use Meringue\Time;

class DefaultTime implements Time
{
    private $hours;
    private $minutes;
    private $seconds;

    public function __construct(int $hours, int $minutes, int $seconds)
    {
        if ($hours < 0 || $hours > 23) {
            throw new Exception(sprintf('Hours should be greater than zero and less then or equal to 24. %s given', $hours));
        }
        if ($minutes < 0 || $minutes > 59) {
            throw new Exception(sprintf('Minutes should be greater than zero and less then or equal to 60. %s given', $hours));
        }
        if ($seconds < 0 || $seconds > 59) {
            throw new Exception(sprintf('Seconds should be greater than zero and less then or equal to 24. %s given', $hours));
        }

        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    public function value(): string
    {
        return sprintf('%02d:%02d:%02d', $this->hours, $this->minutes, $this->seconds);
    }
}