<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\FromISO8601 as Interval;
use Meringue\ISO8601Interval\FromStartDateTimeAndInterval;
use Meringue\Schedule\DailyInLocalTimeZone;
use Meringue\Schedule\LocalScheduleByWeekDays;
use Meringue\Schedule\TimePeriod;
use Meringue\Time\DefaultTime;
use Meringue\WithFixedStartDateTime;
use PHPUnit\Framework\TestCase;

class LocalScheduleByWeekDaysTest extends TestCase
{
    /**
     * @dataProvider hitDateTimes
     */
    public function testIsHit(ISO8601DateTime $dateTime)
    {
        $this->assertTrue(
            (new LocalScheduleByWeekDays(
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(22, 28, 0),
                        new DefaultTime(22, 29, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(11, 0, 0),
                        new DefaultTime(12, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(12, 31, 0),
                        new DefaultTime(13, 47, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(14, 8, 0),
                        new DefaultTime(15, 17, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(15, 18, 0),
                        new DefaultTime(15, 59, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(16, 0, 0),
                        new DefaultTime(17, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(17, 31, 0),
                        new DefaultTime(18, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
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
            [new FromISO8601('2019-03-31 22:29:00+03:00')],
            [new FromISO8601('2019-03-31 11:11:00+04:00')],
            [new FromISO8601('2019-03-31 12:11:00+05:00')],
            [new FromISO8601('2019-04-01 12:49:54+06:00')],
            [new FromISO8601('2019-04-02 14:08:00+07:00')],
            [new FromISO8601('2019-04-03 15:59:00+08:00')],
            [new FromISO8601('2019-04-04 16:27:00+09:00')],
            [new FromISO8601('2019-04-05 18:00:00+10:00')],
            [new FromISO8601('2019-04-06 02:59:59-02:00')],
            [new FromISO8601('2019-04-06 23:00:01-10:00')],
            [new FromISO8601('2019-04-07 22:28:59-05:00')],
        ];
    }

    /**
     * @dataProvider missingDateTimes
     */
    public function testIsMissing(ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new LocalScheduleByWeekDays(
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(0, 0, 0),
                        new DefaultTime(5, 0, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(11, 0, 0),
                        new DefaultTime(12, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(12, 31, 0),
                        new DefaultTime(13, 47, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(14, 8, 0),
                        new DefaultTime(15, 17, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(15, 18, 0),
                        new DefaultTime(15, 59, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(16, 0, 0),
                        new DefaultTime(17, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(17, 31, 0),
                        new DefaultTime(18, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
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
            [new FromISO8601('2019-03-31 10:59:59+08:00')],
            [new FromISO8601('2019-03-31 12:30:01-08:00')],
            [new FromISO8601('2019-03-31 23:02:25+08:00')],

            [new FromISO8601('2019-04-01 12:29:54+08:00')],
            [new FromISO8601('2019-04-01 13:47:01-08:00')],
            [new FromISO8601('2019-04-01 22:10:00+08:00')],

            [new FromISO8601('2019-04-02 14:07:59+11:00')],
            [new FromISO8601('2019-04-02 15:17:01+08:00')],
            [new FromISO8601('2019-04-02 21:00:00-08:00')],

            [new FromISO8601('2019-04-03 15:17:00+11:00')],
            [new FromISO8601('2019-04-03 16:00:00-11:00')],

            [new FromISO8601('2019-04-04 15:27:00+15:00')],
            [new FromISO8601('2019-04-04 17:31:00-07:00')],

            [new FromISO8601('2019-04-05 17:30:00+01:00')],
            [new FromISO8601('2019-04-05 18:30:01-02:00')],

            [new FromISO8601('2019-04-06 05:00:01+09:00')],
            [new FromISO8601('2019-04-06 18:00:01+03:00')],

            [new FromISO8601('2019-04-07 05:00:01-11:00')],
        ];
    }

    /**
     * @dataProvider intervals
     */
    public function testSchedulesForIntervals(WithFixedStartDateTime $interval)
    {
        $this->assertTrue(
            (new LocalScheduleByWeekDays(
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(22, 28, 0),
                        new DefaultTime(22, 29, 0)
                    ),
                    new TimePeriod(
                        new DefaultTime(11, 0, 0),
                        new DefaultTime(12, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(12, 31, 0),
                        new DefaultTime(13, 47, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(14, 8, 0),
                        new DefaultTime(15, 17, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(15, 18, 0),
                        new DefaultTime(15, 59, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(16, 0, 0),
                        new DefaultTime(17, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new TimePeriod(
                        new DefaultTime(17, 31, 0),
                        new DefaultTime(18, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
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
                ->schedule($interval)
        );
    }

    public function intervals()
    {
        return [
            [
                new FromStartDateTimeAndInterval(
                    new FromISO8601('2019-03-31 12:30:01'),
                    new Interval('P2D')
                )
            ],
        ];
    }
}
