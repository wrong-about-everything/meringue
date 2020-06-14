<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Exception;
use Meringue\Date\FromISO8601DateTime;
use Meringue\WeekDay\LocalDayOfWeek;
use Meringue\ISO8601DateTime;
use DateTimeImmutable;
use Meringue\ISO8601Interval\Floating\NDays;
use Meringue\Timeline\Point\Past;

class StartOfTheWeek extends ISO8601DateTime
{
    private $dateTime;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function value(): string
    {
        return
            (new Past(
                new FromPhpDateTime(
                    new DateTimeImmutable(
                        (new FromISO8601DateTime($this->dateTime))->value() . 'T00:00:00',
                        (new DateTimeImmutable($this->dateTime->value()))->getTimezone()
                    )
                ),
                new NDays((new LocalDayOfWeek($this->dateTime))->value() - 1)
            ))
                ->value()
            ;
    }
}
