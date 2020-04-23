<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule;

use Meringue\Schedule\DailyInUTC;
use Meringue\Time\DefaultTime;
use PHPUnit\Framework\TestCase;
use Meringue\Schedule\TimePeriod;
use Meringue\ISO8601DateTime\FromISO8601;

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
                new TimePeriod(
                    new DefaultTime(7, 0, 0),
                    new DefaultTime(23, 59, 59)
                ),
                new TimePeriod(
                    new DefaultTime(0, 0, 0),
                    new DefaultTime(2, 0, 0)
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
            new TimePeriod(
                new DefaultTime($fromHour, 0, 0),
                new DefaultTime($toHour, 0, 0)
            );
    }
}
