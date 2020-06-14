<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;
use Meringue\Time\FromIntegers;

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
                new FromIntegers(0, 0, 0),
                new FromIntegers(23, 59, 59)
            )
        ];
    }
}
