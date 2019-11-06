<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\UTCScheduleByWeekDays;
use Meringue\Schedule\DailyInUTC;
use Meringue\Schedule\TimePeriod;
use Meringue\Time\DefaultTime;
use PHPUnit\Framework\TestCase;

class UTCScheduleByWeekDaysTest extends TestCase
{
    /**
     * @dataProvider hitDateTimes
     */
    public function testIsHit(ISO8601DateTime $dateTime)
    {
        $this->assertTrue(
            (new UTCScheduleByWeekDays(
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(2, 0, 0),
                        new DefaultTime(5, 0, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(11, 0, 0),
                        new DefaultTime(12, 30, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(12, 31, 0),
                        new DefaultTime(13, 47, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(14, 8, 0),
                        new DefaultTime(15, 17, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(15, 18, 0),
                        new DefaultTime(15, 59, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(16, 0, 0),
                        new DefaultTime(17, 30, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(17, 31, 0),
                        new DefaultTime(18, 30, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(0, 0, 0),
                        new DefaultTime(3, 0, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(18, 31, 0),
                        new DefaultTime(23, 59, 59)
                    )
                )
            ))
                ->isHit($dateTime)
        );
    }

    public function hitDateTimes()
    {
        return [
            [new FromISO8601('2019-03-31 01:29:00+03:00')], // Sunday in Moscow, still Saturday in UTC
            [new FromISO8601('2019-03-31 11:11:00+00:00')], // Sunday in UTC
            [new FromISO8601('2019-03-31 14:11:00+03:00')], // Sunday in UTC
            [new FromISO8601('2019-04-01 12:49:54+00:00')],
            [new FromISO8601('2019-04-02 14:08:00+00:00')],
            [new FromISO8601('2019-04-03 15:59:00+00:00')],
            [new FromISO8601('2019-04-04 16:27:00+00:00')],
            [new FromISO8601('2019-04-05 18:00:00+00:00')],
            [new FromISO8601('2019-04-06 02:59:59+00:00')],
            [new FromISO8601('2019-04-06 23:00:01+00:00')],
            [new FromISO8601('2019-04-07 04:59:59+00:00')],
        ];
    }

    /**
     * @dataProvider missingDateTimes
     */
    public function testIsMissing(ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new UTCScheduleByWeekDays(
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(0, 0, 0),
                        new DefaultTime(5, 0, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(11, 0, 0),
                        new DefaultTime(12, 30, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(12, 31, 0),
                        new DefaultTime(13, 47, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(14, 8, 0),
                        new DefaultTime(15, 17, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(15, 18, 0),
                        new DefaultTime(15, 59, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(16, 0, 0),
                        new DefaultTime(17, 30, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(17, 31, 0),
                        new DefaultTime(18, 30, 0)
                    )
                ),
                new DailyInUTC(
                    new TimePeriod(
                        new DefaultTime(0, 0, 0),
                        new DefaultTime(3, 0, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(18, 31, 0),
                        new DefaultTime(23, 59, 59)
                    )
                )
            ))
                ->isHit($dateTime)
        );
    }

    public function missingDateTimes()
    {
        return [
            [new FromISO8601('2019-03-31 10:59:59')],
            [new FromISO8601('2019-03-31 12:30:01')],
            [new FromISO8601('2019-03-31 23:02:25')],

            [new FromISO8601('2019-04-01 12:29:54')],
            [new FromISO8601('2019-04-01 13:47:01')],
            [new FromISO8601('2019-04-01 22:10:00')],

            [new FromISO8601('2019-04-02 14:07:59')],
            [new FromISO8601('2019-04-02 15:17:01')],
            [new FromISO8601('2019-04-02 21:00:00')],

            [new FromISO8601('2019-04-03 15:17:00')],
            [new FromISO8601('2019-04-03 16:00:00')],

            [new FromISO8601('2019-04-04 15:27:00')],
            [new FromISO8601('2019-04-04 17:31:00')],

            [new FromISO8601('2019-04-05 17:30:00')],
            [new FromISO8601('2019-04-05 18:30:01')],

            [new FromISO8601('2019-04-06 05:00:01')],
            [new FromISO8601('2019-04-06 18:00:01')],

            [new FromISO8601('2019-04-07 05:00:01')],
        ];
    }
}
