<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\FromRange;
use Meringue\Schedule\Single;
use Meringue\Schedule\TwentyFourSeven;
use Meringue\Time;
use Meringue\Time\DefaultTime;
use PHPUnit\Framework\TestCase;

class SingleTest extends TestCase
{
    /**
     * @dataProvider dateTimesOnSchedule
     */
    public function testIsHit(Time $from, Time $till, ISO8601DateTime $dateTime)
    {
        $this->assertTrue(
            (new Single($from, $till))
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
                new DefaultTime(11, 30, 10),
                new DefaultTime(11, 30, 11),
                new FromISO8601('2019-01-31 11:30:10')
            ],
            [
                new DefaultTime(11, 30, 10),
                new DefaultTime(11, 30, 11),
                new FromISO8601('2019-01-31 11:30:11')
            ],
            [
                new DefaultTime(23, 00, 00),
                new DefaultTime(23, 59, 59),
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
            (new Single($from, $till))
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
                new DefaultTime(18, 30, 0),
                new FromISO8601('2019-01-01 18:30:01')
            ],
        ];
    }

    public function testWithGreaterFromTime()
    {
        try {
            (new Single(
                new DefaultTime(11, 30, 0),
                new DefaultTime(10, 30, 0)
            ))
                    ->isHit(
                        new FromISO8601('2019-01-01 11:29:59')
                    );

            $this->fail('Exception expected');
        } catch (\Throwable $exception) {
            $this->assertEquals('Till time must be greater that from time. Next day must use multiply schedules.', $exception->getMessage());
        }
    }
}
