<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule;

use Meringue\Schedule\DailyInLocalTimeZone;
use Meringue\Time\FromIntegers;
use PHPUnit\Framework\TestCase;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;
use Meringue\ISO8601DateTime\FromISO8601;

class DailyInLocalTimeZoneTest extends TestCase
{
    public function testWithOneSuccessfulSchedule()
    {
        $this->assertTrue(
            (new DailyInLocalTimeZone(
                $this->timePeriod(10, 12)
            ))
                ->isHit(
                    new FromISO8601('2019-01-01T11:00:00+08:00')
                )
        );
    }

    public function testWithSomeSuccessfulSchedules()
    {
        $this->assertTrue(
            (new DailyInLocalTimeZone(
                $this->timePeriod(12, 13),
                $this->timePeriod(14, 15),
                $this->timePeriod(17, 18)
            ))
                ->isHit(new FromISO8601('2019-01-01T12:00:00-07'))
        );
    }

    public function testWithSeveralSchedulesAndOnlyOneIsSuccessful()
    {
        $this->assertTrue(
            (new DailyInLocalTimeZone(
                $this->timePeriod(7, 8),
                $this->timePeriod(11, 12),
                $this->timePeriod(14, 19)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00+05'))
        );
    }

    /**
     * @dataProvider dateTimesInMoscowTimeZone
     */
    public function testWithDateTimeInMoscowTimeZone(string $dateTime, bool $isHit)
    {
        $this->assertEquals(
            $isHit,
            (new DailyInLocalTimeZone(
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
            ['2019-08-11T02:01:00+03:00', false],
            ['2019-08-11T03:45:00+03:00', false],
            ['2019-08-11T04:59:59+03:00', false],
            ['2019-08-11T05:00:17+03:00', false],
            ['2019-08-11T09:48:24+03:00', true],
            ['2019-08-11T10:02:12+03:00', true],
            ['2019-08-11T12:35:12+03:00', true],
            ['2019-08-11T20:00:00+03:00', true],
            ['2019-08-11T23:59:59+03:00', true],
        ];
    }

    public function testWithFailedSchedules()
    {
        $this->assertFalse(
            (new DailyInLocalTimeZone(
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
}
