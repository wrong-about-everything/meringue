<?php

declare(strict_types=1);

namespace Meringue\Schedule\Daily;

use Meringue\ISO8601DateTime;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;
use Meringue\Schedule\Type\Type;
use Meringue\Time\FromIntegers;
use Meringue\Schedule\Type\TwentyFourSeven as TwentyFourSevenType;

class TwentyFourSeven extends Daily
{
    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return true;
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return [
            new DefaultTimePeriod(
                new FromIntegers(0, 0, 0),
                new FromIntegers(23, 59, 59)
            )
        ];
    }

    public function timePeriods(): array
    {
        return [
            new DefaultTimePeriod(
                new FromIntegers(0, 0, 0),
                new FromIntegers(23, 59, 59)
            )
        ];
    }

    public function type(): Type
    {
        return new TwentyFourSevenType();
    }
}
