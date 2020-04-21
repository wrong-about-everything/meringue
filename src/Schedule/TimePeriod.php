<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use DateTimeImmutable as PHPDateTime;
use Exception;
use Meringue\FormattedDateTime\Date;
use Meringue\FormattedDateTime\CustomFormatted;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Time;

class TimePeriod
{
    private $from;
    private $till;

    public function __construct(Time $from, Time $till)
    {
        $this->from = $from;
        $this->till = $till;

        if ($this->from->greaterThan($this->till)) {
            throw new Exception('"Till" must be greater than "from". Use a separate schedule object for the next day\'s schedule if you need to. See ByWeekDaysTest for details.');
        }
    }

    public function fromTillPair()
    {
        return [$this->from, $this->till];
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
                    (new Date($dateTime))->value() . ' ' . $this->from->value() . (new CustomFormatted($dateTime, 'P'))->value()
                ))
                    ->value()
            );
    }

    private function dateTimeIsLessOrEqualsToTill(ISO8601DateTime $dateTime)
    {
        return
            new PHPDateTime(
                (new CustomFormatted(
                    $dateTime,
                    "c"
                ))
                    ->value()
            )
            <=
            new PHPDateTime(
                (new FromISO8601(
                    (new Date($dateTime))->value() . ' ' . $this->till->value() . (new CustomFormatted($dateTime, 'P'))->value()
                ))
                    ->value()
            );
    }
}
