<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Time;

abstract class TimePeriod
{
    /**
     * @return Time[]
     */
    abstract public function fromTillPair(): array;

    abstract public function isHit(ISO8601DateTime $dateTime): bool;

    abstract public function isVoid(): bool;
}
