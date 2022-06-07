<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class TwentyFourSeven extends Type
{
    public function value(): int
    {
        return 3;
    }

    public function comparableWith(): array
    {
        return [new DailyInLocalTimeZone(), new DailyInUTC()];
    }
}