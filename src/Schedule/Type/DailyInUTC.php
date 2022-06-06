<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class DailyInUTC extends Type
{
    public function value(): int
    {
        return 3;
    }
}