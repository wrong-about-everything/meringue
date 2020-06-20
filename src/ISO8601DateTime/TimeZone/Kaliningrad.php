<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime\TimeZone;

use Meringue\ISO8601DateTime\TimeZone;

class Kaliningrad implements TimeZone
{
    public function value(): string
    {
        return 'Europe/Kaliningrad';
    }
}
