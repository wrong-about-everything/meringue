<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class ByWeekDaysInLocalTimeZone extends Type
{
    public function value(): int
    {
        return 5;
    }

    protected function comparableWith(): array
    {
        return [];
    }
}