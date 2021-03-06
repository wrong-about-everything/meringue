<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule\TimePeriod;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;
use Meringue\Time;
use Meringue\Time\FromIntegers;
use PHPUnit\Framework\TestCase;
use Throwable;

class DefaultTimePeriodTest extends TestCase
{
    /**
     * @dataProvider dateTimesOnSchedule
     */
    public function testIsHit(Time $from, Time $till, ISO8601DateTime $dateTime)
    {
        $this->assertTrue(
            (new DefaultTimePeriod($from, $till))
                ->isHit($dateTime)
        );
    }

    public function dateTimesOnSchedule()
    {
        return [
            [
                new FromIntegers(11, 30, 0),
                new FromIntegers(18, 30, 0),
                new FromISO8601('2019-01-01 14:27:59-08:00')
            ],
            [
                new FromIntegers(11, 30, 10),
                new FromIntegers(11, 30, 11),
                new FromISO8601('2019-01-31 11:30:10+11:30')
            ],
            [
                new FromIntegers(11, 30, 10),
                new FromIntegers(11, 30, 11),
                new FromISO8601('2019-01-31 11:30:11-01:00')
            ],
            [
                new FromIntegers(23, 00, 00),
                new FromIntegers(23, 59, 59),
                new FromISO8601('2019-01-31 23:59:59.5')
            ],
        ];
    }

    /**
     * @dataProvider dateTimesOutOfSchedule
     */
    public function testIsNotHit(Time $from, Time $till, ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new DefaultTimePeriod($from, $till))
                ->isHit($dateTime)
        );
    }

    public function dateTimesOutOfSchedule()
    {
        return [
            [
                new FromIntegers(11, 30, 0),
                new FromIntegers(18, 30, 0),
                new FromISO8601('2019-01-01 11:29:59')
            ],
            [
                new FromIntegers(11, 30, 0),
                new FromIntegers(18, 30, 0),
                new FromISO8601('2019-01-01 18:30:01')
            ],
        ];
    }

    public function testWithGreaterFromTime()
    {
        try {
            (new DefaultTimePeriod(
                new FromIntegers(11, 30, 0),
                new FromIntegers(10, 30, 0)
            ))
                ->isHit(
                    new FromISO8601('2019-01-01 11:29:59')
                );

            $this->fail('Exception expected');
        } catch (Throwable $exception) {
            $this->assertEquals('"Till" must be greater than "from". Use a separate schedule object for the next day\'s schedule if you need to. See ByWeekDaysTest for details.', $exception->getMessage());
        }
    }
}
