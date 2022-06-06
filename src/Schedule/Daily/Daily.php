<?php

declare(strict_types=1);

namespace Meringue\Schedule\Daily;

use Exception;
use Meringue\ISO8601DateTime;
use Meringue\Schedule\TimePeriod;
use Meringue\Schedule\Type\Type;

abstract class Daily
{
    abstract public function isHit(ISO8601DateTime $dateTime): bool;

    /**
     * @return TimePeriod[]
     */
    abstract public function for(ISO8601DateTime $dateTime): array;

    abstract public function type(): Type;

    /**
     * @return TimePeriod[]
     */
    abstract public function timePeriods(): array;

    final public function equals(Daily $other): bool
    {
        if (!$this->type()->equals($other->type())) {
            throw new Exception('You can not compare schedules of different types.');
        }

        return
            array_map(
                function (TimePeriod $timePeriod) {
                    return [$timePeriod->fromTillPair()[0]->value(), $timePeriod->fromTillPair()[1]->value()];
                },
                $this->timePeriods()
            )
                ==
            array_map(
                function (TimePeriod $timePeriod) {
                    return [$timePeriod->fromTillPair()[0]->value(), $timePeriod->fromTillPair()[1]->value()];
                },
                $other->timePeriods()
            )
        ;
    }
}