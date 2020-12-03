<?php

declare(strict_types=1);

namespace Meringue;

use Meringue\Schedule\TimePeriod\DefaultTimePeriod;

interface Schedule
{
    public function isHit(ISO8601DateTime $dateTime): bool;

    /**
     * @return DefaultTimePeriod[]
     */
    public function for(ISO8601DateTime $dateTime): array;
}
