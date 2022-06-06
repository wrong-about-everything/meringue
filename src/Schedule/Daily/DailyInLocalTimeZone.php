<?php

declare(strict_types=1);

namespace Meringue\Schedule\Daily;

use Meringue\ISO8601DateTime;
use Meringue\Schedule\TimePeriod;
use Meringue\Schedule\Type\DailyInLocalTimeZone as DailyInLocalTimeZoneScheduleType;
use Meringue\Schedule\Type\Type;

class DailyInLocalTimeZone extends Daily
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

    public function for(ISO8601DateTime $dateTime): array
    {
        return $this->timePeriods;
    }

    public function type(): Type
    {
        return new DailyInLocalTimeZoneScheduleType();
    }

    public function timePeriods(): array
    {
        return $this->timePeriods;
    }
}
