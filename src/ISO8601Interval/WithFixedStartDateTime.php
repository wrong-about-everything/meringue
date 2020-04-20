<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromStartDateTimeAndInterval;
use Meringue\Timeline\Point\Now;

abstract class WithFixedStartDateTime implements ISO8601Interval
{
    abstract public function starts(): ISO8601DateTime;

    abstract public function ends(): ISO8601DateTime;

    public function equalsTo(WithFixedStartDateTime $interval): bool
    {
        $now = new Now();
        return
            (new FromStartDateTimeAndInterval($now, $this))->ends()
                ->equalsTo(
                    (new FromStartDateTimeAndInterval($now, $interval))->ends()
                );
    }

    public function longerThan(WithFixedStartDateTime $interval): bool
    {
        $now = new Now();
        return
            (new FromStartDateTimeAndInterval($now, $this))->ends()
                ->laterThan(
                    (new FromStartDateTimeAndInterval($now, $interval))->ends()
                );
    }

    public function shorterThan(WithFixedStartDateTime $interval): bool
    {
        $now = new Now();
        return
            (new FromStartDateTimeAndInterval($now, $interval))->ends()
                ->laterThan(
                    (new FromStartDateTimeAndInterval($now, $this))->ends()
                );
    }
}
