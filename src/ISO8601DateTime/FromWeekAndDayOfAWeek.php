<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use DateTimeInterface;
use Meringue\Date\Week;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval\Floating\NDays;
use Meringue\Timeline\Point\Future;
use Meringue\WeekDay;
use Meringue\WeekDay\Monday;

class FromWeekAndDayOfAWeek extends ISO8601DateTime
{
    private $week;
    private $weekDay;

    public function __construct(Week $week, WeekDay $weekDay)
    {
        $this->week = $week;
        $this->weekDay = $weekDay;
    }

    public function value(): string
    {
        return
            (new Future(
                new FromISO8601($this->week->value()),
                new NDays(
                    $this->weekDay->value() - (new Monday())->value()
                )
            ))
                ->value();
    }
}
