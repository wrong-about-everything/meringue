<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class ByWeekDaysInUTC extends Type
{
    public function value(): int
    {
        return 0;
    }
}