<?php

declare(strict_types=1);

namespace Meringue\Schedule\Daily;

use Meringue\ISO8601DateTime;
use Meringue\Schedule\Type\Closed as ClosedType;
use Meringue\Schedule\Type\Type;

class Closed extends Daily
{
    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return false;
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return [];
    }

    public function type(): Type
    {
        return new ClosedType();
    }

    public function timePeriods(): array
    {
        return [];
    }
}
