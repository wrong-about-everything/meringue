<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;
use Meringue\Time\DefaultTime;

class TwentyFourSeven implements Schedule
{
    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return true;
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return [
            new TimePeriod(
                new DefaultTime(0, 0, 0),
                new DefaultTime(23, 59, 59)
            )
        ];
    }
}
