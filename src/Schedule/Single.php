<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\FormattedDateTime\Date;
use Meringue\FormattedDateTime\InCustomFormat;
use Meringue\ISO8601DateTime;
use Meringue\Schedule;
use Meringue\Time;
use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Exception;

class Single implements Schedule
{
    private $from;
    private $till;

    public function __construct(Time $from, Time $till)
    {
        $this->from = $from;
        $this->till = $till;

        if ($this->from->greaterThan($this->till)) {
            throw new Exception('Till time must be greater that from time. Next day must use multiply schedules.');
        }
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
            new PHPDateTime(
                (new InCustomFormat(
                     $dateTime,
                    "c"
                ))
                    ->value()
            )
            <=
            new PHPDateTime(
                (new FromISO8601(
                    (new Date($dateTime))->value() . ' '. $this->till->value()
                ))
                    ->value()
            );
    }
}