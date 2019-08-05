<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;

class Multiple implements Schedule
{
    private $schedules;

    public function __construct(Schedule ...$schedules)
    {
        $this->schedules = $schedules;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        /** @var Schedule $schedule */
        foreach ($this->schedules as $schedule) {
            if ($schedule->isHit($dateTime)) {
                return true;
            }
        }

        return false;
    }
}