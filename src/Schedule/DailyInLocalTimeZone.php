<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;

class DailyInLocalTimeZone implements Schedule
{
    private $timePeriods;

    public function __construct(TimePeriod ...$timePeriods)
    {
        $this->timePeriods = $timePeriods;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        /** @var TimePeriod $timePeriod */
        foreach ($this->timePeriods as $timePeriod) {
            if ($timePeriod->isHit($dateTime)) {
                return true;
            }
        }

        return false;
    }
}
