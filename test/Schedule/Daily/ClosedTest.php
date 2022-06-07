<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule\Daily;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\Schedule\Daily\Closed;
use Meringue\Schedule\Daily\Daily;
use Meringue\Schedule\Daily\DailyInLocalTimeZone;
use Meringue\Schedule\Daily\DailyInUTC;
use Meringue\Schedule\Daily\TwentyFourSeven;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;
use Meringue\Time\FromIntegers;
use PHPUnit\Framework\TestCase;

class ClosedTest extends TestCase
{
    /**
     * @dataProvider dateTimes
     */
    public function testIsNotHit(ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new Closed())
                ->isHit($dateTime)
        );
    }

    public function dateTimes()
    {
        return [
            [new FromTimestamp(0)],
            [new FromISO8601('2019-01-01 00:00:00')],
        ];
    }

    public function testSchedulesAreEqual()
    {
        $this->assertTrue(
            (new Closed())->equals(new Closed())
        );
    }

    /**
     * @dataProvider schedulesNonEqualToClosed
     */
    public function testSchedulesAreNotEqual(Daily $dailySchedule)
    {
        $this->assertFalse(
            (new Closed())->equals($dailySchedule)
        );
    }

    public function schedulesNonEqualToClosed()
    {
        return [
            [new TwentyFourSeven()],
            [
                new DailyInUTC(
                    new DefaultTimePeriod(
                        new FromIntegers(1, 2, 3),
                        new FromIntegers(4, 5, 6)
                    )
                )
            ],
            [
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(1, 2, 3),
                        new FromIntegers(4, 5, 6)
                    )
                )
            ],
        ];
    }
}
