<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule\Daily;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\Daily\Closed;
use Meringue\Schedule\Daily\Daily;
use Meringue\Schedule\Daily\DailyInUTC;
use Meringue\Schedule\Daily\TwentyFourSeven;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;
use Meringue\Time\FromIntegers;
use PHPUnit\Framework\TestCase;

class DailyInUTCTest extends TestCase
{
    public function testWithOneSuccessfulSchedule()
    {
        $this->assertTrue(
            (new DailyInUTC(
                $this->timePeriod(10, 12)
            ))
                ->isHit(
                    new FromISO8601('2019-01-01T11:00:00+00')
                )
        );
    }

    public function testWithSomeSuccessfulSchedules()
    {
        $this->assertTrue(
            (new DailyInUTC(
                $this->timePeriod(11, 12),
                $this->timePeriod(10, 13),
                $this->timePeriod(10, 19)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00+00'))
        );
    }

    public function testWithSeveralSchedulesAndOnlyOneIsSuccessful()
    {
        $this->assertTrue(
            (new DailyInUTC(
                $this->timePeriod(0, 7),
                $this->timePeriod(11, 12),
                $this->timePeriod(14, 19)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00+00'))
        );
    }

    /**
     * @dataProvider dateTimesInMoscowTimeZone
     */
    public function testWithDateTimeInMoscowTimeZone(string $dateTime, bool $isHit)
    {
        $this->assertEquals(
            $isHit,
            (new DailyInUTC(
                new DefaultTimePeriod(
                    new FromIntegers(7, 0, 0),
                    new FromIntegers(23, 59, 59)
                ),
                new DefaultTimePeriod(
                    new FromIntegers(0, 0, 0),
                    new FromIntegers(2, 0, 0)
                )
            ))
                ->isHit(new FromISO8601($dateTime))
        );
    }

    public function dateTimesInMoscowTimeZone()
    {
        return [
            ['2019-08-11T02:01:00+03:00', true],
            ['2019-08-11T03:45:00+03:00', true],
            ['2019-08-11T04:59:59+03:00', true],
            ['2019-08-11T05:00:17+03:00', false],
            ['2019-08-11T09:48:24+03:00', false],
            ['2019-08-11T10:02:12+03:00', true],
            ['2019-08-11T12:35:12+03:00', true],
            ['2019-08-11T20:00:00+03:00', true],
            ['2019-08-11T23:59:59+03:00', true],
        ];
    }

    public function testWithFailedSchedules()
    {
        $this->assertFalse(
            (new DailyInUTC(
                $this->timePeriod(0, 7),
                $this->timePeriod(12, 23)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00'))
        );
    }

    private function timePeriod(int $fromHour, int $toHour)
    {
        return
            new DefaultTimePeriod(
                new FromIntegers($fromHour, 0, 0),
                new FromIntegers($toHour, 0, 0)
            );
    }

    public function testSchedulesAreEqual()
    {
        $this->assertTrue(
            $this->firstSchedule()->equals($this->firstSchedule())
        );
    }

    /**
     * @dataProvider schedulesNonEqualToFirstOne
     */
    public function testSchedulesAreNotEqual(Daily $dailySchedule)
    {
        $this->assertFalse(
            $this->firstSchedule()->equals($dailySchedule)
        );
    }

    public function schedulesNonEqualToFirstOne()
    {
        return [
            [new TwentyFourSeven()],
            [new Closed()],
            [
                new DailyInUTC(
                    new DefaultTimePeriod(
                        new FromIntegers(1, 2, 3),
                        new FromIntegers(4, 5, 7)
                    )
                )
            ],
        ];
    }

    private function firstSchedule()
    {
        return
            new DailyInUTC(
                new DefaultTimePeriod(
                    new FromIntegers(1, 2, 3),
                    new FromIntegers(4, 5, 6)
                )
            );
    }
}
