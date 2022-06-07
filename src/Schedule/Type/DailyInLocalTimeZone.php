<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class DailyInLocalTimeZone extends Type
{
    public function value(): int
    {
        return 1;
    }

    protected function comparableWith(): array
    {
        return [new Closed(), new TwentyFourSeven()];
    }
}