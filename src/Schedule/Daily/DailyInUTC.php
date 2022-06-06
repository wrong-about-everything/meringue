<?php

declare(strict_types=1);

namespace Meringue\Schedule\Daily;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\PhpSpecificTimeZone\UTC;
use Meringue\ISO8601DateTime\AdjustedAccordingToTimeZone;
use Meringue\Schedule\TimePeriod;
use Meringue\Schedule\Type\DailyInUTC as DailyInUTCType;
use Meringue\Schedule\Type\Type;

class DailyInUTC extends Daily
{
    private $timePeriods;

    public function __construct(TimePeriod ...$timePeriods)
    {
        $this->timePeriods = $timePeriods;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        /** @var TimePeriod $timePeriod */
        foreach ($this->timePeriods as $timePeriod) {
            if ($timePeriod->isHit(new AdjustedAccordingToTimeZone($dateTime, new UTC()))) {
                return true;
            }
        }

        return false;
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return $this->timePeriods;
    }

    public function type(): Type
    {
        return new DailyInUTCType();
    }

    public function timePeriods(): array
    {
        return $this->timePeriods;
    }
}
