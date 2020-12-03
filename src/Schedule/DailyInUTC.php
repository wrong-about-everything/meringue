<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\PhpSpecificTimeZone\UTC;
use Meringue\ISO8601DateTime\AdjustedAccordingToTimeZone;
use Meringue\Schedule;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;

class DailyInUTC implements Schedule
{
    private $timePeriods;

    public function __construct(DefaultTimePeriod ...$timePeriods)
    {
        $this->timePeriods = $timePeriods;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        /** @var DefaultTimePeriod $timePeriod */
        foreach ($this->timePeriods as $timePeriod) {
            if ($timePeriod->isHit(new AdjustedAccordingToTimeZone($dateTime, new UTC()))) {
                return true;
            }
        }

        return false;
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return $this->timePeriods;
    }
}
