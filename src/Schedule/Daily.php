<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\FormattedDateTime\Date;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule;
use Meringue\Time;
use DateTimeImmutable as PHPDateTime;

class Daily implements Schedule
{
    private $from;
    private $till;

    public function __construct(Time $from, Time $till)
    {
        $this->from = $from;
        $this->till = $till;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        return $this->dateTimeIsGreaterOrEqualsToFrom($dateTime) && $this->dateTimeIsLessOrEqualsToTill($dateTime);
    }

    private function dateTimeIsGreaterOrEqualsToFrom(ISO8601DateTime $dateTime)
    {
        return
            new PHPDateTime($dateTime->value())
                >=
            new PHPDateTime(
                (new FromISO8601(
                    (new Date($dateTime))->value() . ' '. $this->from->value()
                ))
                    ->value()
            );
    }

    private function dateTimeIsLessOrEqualsToTill(ISO8601DateTime $dateTime)
    {
        return
            new PHPDateTime($dateTime->value())
                <=
            new PHPDateTime(
                (new FromISO8601(
                    (new Date($dateTime))->value() . ' '. $this->till->value()
                ))
                    ->value()
            );
    }
}