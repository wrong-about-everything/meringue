<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class Closed extends Type
{
    public function value(): int
    {
        return 2;
    }

    public function comparableWith(): array
    {
        return [new DailyInLocalTimeZone(), new DailyInUTC(), new TwentyFourSeven()];
    }
}