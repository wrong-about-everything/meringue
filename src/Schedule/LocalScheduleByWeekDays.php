<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\FormattedDateTime\LocalDayOfWeek;
use Meringue\ISO8601DateTime;
use Meringue\Schedule;
use Exception;
use Meringue\WithFixedStartDateTime;

/**
 * isHit()'s argument, $dateTime, should be in the same timezone that is implied by daily schedules.
 * For example, consider a schedule for some San Francisco's store, which works only on Sundays from 8 am to 10 pm .
 * It's hit on 2019-11-03T14:50:00-08:00, because it's Sunday in SF. It's hit as well on 2019-11-04T11:15:00+07:00, because it's Sunday, 8pm in SF.
 * So it's inherently client's responsibility to reinforce this logical correspondence between implied schedules' timezone
 * and the one of the passed datetime.
 *
 * This class is implied to have all the daily schedules in the same timezone that passed $dateTime has.
 */
class LocalScheduleByWeekDays implements Schedule
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
        switch ((int) (new LocalDayOfWeek($dateTime))->numeric()) {
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

    public function for(WithFixedStartDateTime $interval): array
    {
        // TODO: Implement for() method.
    }
}
