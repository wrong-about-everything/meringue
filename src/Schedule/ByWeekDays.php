<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\FormattedDateTime\Date;
use Meringue\FormattedDateTime\DayOfWeekInUTC;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule;
use Meringue\Time;
use DateTimeImmutable as PHPDateTime;
use Exception;

class ByWeekDays implements Schedule
{
    private $sunday;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;

    public function __construct(
        Schedule $sunday,
        Schedule $monday,
        Schedule $tuesday,
        Schedule $wednesday,
        Schedule $thursday,
        Schedule $friday,
        Schedule $saturday
    )
    {
        $this->sunday = $sunday;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        switch ((int) (new DayOfWeekInUTC($dateTime))->numeric()) {
            case 7:
                return $this->sunday->isHit($dateTime);

            case 1:
                return $this->monday->isHit($dateTime);

            case 2:
                return $this->tuesday->isHit($dateTime);

            case 3:
                return $this->wednesday->isHit($dateTime);

            case 4:
                return $this->thursday->isHit($dateTime);

            case 5:
                return $this->friday->isHit($dateTime);

            case 6:
                return $this->saturday->isHit($dateTime);

            default:
                throw new Exception();
        }
    }
}
