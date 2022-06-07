<?php

declare(strict_types=1);

namespace Meringue\Schedule\Weekly;

use Meringue\Schedule\Daily\TwentyFourSeven as TwentyFourSevenDaily;
use Meringue\Schedule\Type\ByWeekDaysInLocalTimeZone;
use Meringue\Schedule\Type\Type;
use Meringue\Schedule\Weekly\Weekly as WeeklySchedule;
use Meringue\ISO8601DateTime;

class TwentyFourSeven extends WeeklySchedule
{
    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return true;
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return (new TwentyFourSevenDaily())->for($dateTime);
    }

    public function type(): Type
    {
        return new ByWeekDaysInLocalTimeZone();
    }

    protected function allTimePeriodsSplitByDay(): array
    {
        return [
            (new TwentyFourSevenDaily())->timePeriods(),
            (new TwentyFourSevenDaily())->timePeriods(),
            (new TwentyFourSevenDaily())->timePeriods(),
            (new TwentyFourSevenDaily())->timePeriods(),
            (new TwentyFourSevenDaily())->timePeriods(),
            (new TwentyFourSevenDaily())->timePeriods(),
            (new TwentyFourSevenDaily())->timePeriods(),
        ];
    }
}
