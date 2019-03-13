<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromMilliseconds;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\FromRange;
use Meringue\Schedule\Daily;
use Meringue\Schedule\TwentyFourSeven;
use Meringue\Time;
use Meringue\Time\DefaultTime;
use PHPUnit\Framework\TestCase;

class DailyTest extends TestCase
{
    /**
     * @dataProvider dateTimesOnSchedule
     */
    public function testIsHit(Time $from, Time $till, ISO8601DateTime $dateTime)
    {
        $this->assertTrue(
            (new Daily($from, $till))
                ->isHit($dateTime)
        );
    }

    public function dateTimesOnSchedule()
    {
        return [
            [
                new DefaultTime(11, 30, 0),
                new DefaultTime(18, 30, 0),
                new FromISO8601('2019-01-01 14:27:59')
            ],
            [
                new DefaultTime(11, 30, 0),
                new DefaultTime(6, 0, 0),
                new FromISO8601('2019-01-31 05:27:59')
            ],
            [
                new DefaultTime(11, 30, 0),
                new DefaultTime(6, 0, 0),
                new FromISO8601('2019-01-31 23:12:27')
            ],
        ];
    }

    /**
     * @dataProvider dateTimesOutOfSchedule
     */
    public function testIsNotHit(Time $from, Time $till, ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new Daily($from, $till))
                ->isHit($dateTime)
        );
    }

    public function dateTimesOutOfSchedule()
    {
        return [
            [
                new DefaultTime(11, 30, 0),
                new DefaultTime(18, 30, 0),
                new FromISO8601('2019-01-01 11:29:59')
            ],
            [
                new DefaultTime(11, 30, 0),
                new DefaultTime(6, 0, 0),
                new FromISO8601('2019-01-01 10:29:59')
            ],
        ];
    }
}