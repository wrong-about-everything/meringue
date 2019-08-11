<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;

class TwentyFourSeven implements Schedule
{
    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return true;
    }
}