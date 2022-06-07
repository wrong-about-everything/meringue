<?php

declare(strict_types=1);

namespace Meringue\Schedule\Weekly;

use Exception;
use Meringue\ISO8601DateTime;
use Meringue\Schedule\TimePeriod;
use Meringue\Schedule\Type\Type;

abstract class Weekly
{
    abstract public function isHit(ISO8601DateTime $dateTime): bool;

    /**
     * @return TimePeriod[]
     */
    abstract public function for(ISO8601DateTime $dateTime): array;

    abstract public function type(): Type;

    /**
     * @return TimePeriod[][]
     */
    abstract protected function allTimePeriodsSplitByDay(): array;

    final public function equals(Weekly $other): bool
    {
        if (!$this->type()->isComparableWith($other->type())) {
            throw new Exception('You can not compare schedules of different types.');
        }

        return
            array_map(
                function (array $timePeriods) {
                    return
                        array_map(
                            function (TimePeriod $timePeriod) {
                                return [$timePeriod->fromTillPair()[0]->value(), $timePeriod->fromTillPair()[1]->value()];
                            },
                            $timePeriods
                        );
                },
                $this->allTimePeriodsSplitByDay()
            )
                ==
            array_map(
                function (array $timePeriods) {
                    return
                        array_map(
                            function (TimePeriod $timePeriod) {
                                return [$timePeriod->fromTillPair()[0]->value(), $timePeriod->fromTillPair()[1]->value()];
                            },
                            $timePeriods
                        );
                },
                $other->allTimePeriodsSplitByDay()
            )
        ;
    }
}
