<?php

declare(strict_types=1);

namespace Meringue\Schedule\TimePeriod;

use DateTimeImmutable as PHPDateTime;
use Exception;
use Meringue\Date\FromISO8601DateTime;
use Meringue\FormattedDateTime\ISO8601Formatted;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\TimePeriod;
use Meringue\Time;

class VoidTimePeriod extends TimePeriod
{
    public function fromTillPair(): array
    {
        throw new Exception('This time period is void');
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return false;
    }

    public function isVoid(): bool
    {
        return true;
    }
}
