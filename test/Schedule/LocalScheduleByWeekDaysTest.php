<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\DailyInLocalTimeZone;
use Meringue\Schedule\LocalScheduleByWeekDays;
use Meringue\Schedule\TimePeriod;
use Meringue\Schedule\TimePeriod\DefaultTimePeriod;
use Meringue\Time;
use Meringue\Time\FromIntegers;
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
                    new DefaultTimePeriod(
                        new FromIntegers(22, 28, 0),
                        new FromIntegers(22, 29, 0)
                    ),
                    new DefaultTimePeriod(
                        new FromIntegers(11, 0, 0),
                        new FromIntegers(12, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(12, 31, 0),
                        new FromIntegers(13, 47, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(14, 8, 0),
                        new FromIntegers(15, 17, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(15, 18, 0),
                        new FromIntegers(15, 59, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(16, 0, 0),
                        new FromIntegers(17, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(17, 31, 0),
                        new FromIntegers(18, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(0, 0, 0),
                        new FromIntegers(3, 0, 0)
                    ),
                    new DefaultTimePeriod(
                        new FromIntegers(18, 31, 0),
                        new FromIntegers(23, 59, 59)
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
                    new DefaultTimePeriod(
                        new FromIntegers(0, 0, 0),
                        new FromIntegers(5, 0, 0)
                    ),
                    new DefaultTimePeriod(
                        new FromIntegers(11, 0, 0),
                        new FromIntegers(12, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(12, 31, 0),
                        new FromIntegers(13, 47, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(14, 8, 0),
                        new FromIntegers(15, 17, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(15, 18, 0),
                        new FromIntegers(15, 59, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(16, 0, 0),
                        new FromIntegers(17, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(17, 31, 0),
                        new FromIntegers(18, 30, 0)
                    )
                ),
                new DailyInLocalTimeZone(
                    new DefaultTimePeriod(
                        new FromIntegers(0, 0, 0),
                        new FromIntegers(3, 0, 0)
                    ),
                    new DefaultTimePeriod(
                        new FromIntegers(18, 31, 0),
                        new FromIntegers(23, 59, 59)
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
     * @dataProvider dateTimes
     */
    public function testSchedulesForSpecificDate(ISO8601DateTime $dateTime, array $expectedSchedule)
    {
        $this->assertEquals(
            $expectedSchedule,
            array_map(
                function (TimePeriod $timePeriod) {
                    return
                        array_map(
                            function (Time $time) {
                                return $time->value();
                            },
                            $timePeriod->fromTillPair()
                        );
                },
                (new LocalScheduleByWeekDays(
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(12, 31, 0),
                            new FromIntegers(13, 47, 0)
                        )
                    ),
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(22, 28, 0),
                            new FromIntegers(22, 29, 0)
                        ),
                        new DefaultTimePeriod(
                            new FromIntegers(11, 0, 0),
                            new FromIntegers(12, 30, 0)
                        )
                    ),
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(14, 8, 0),
                            new FromIntegers(15, 17, 0)
                        )
                    ),
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(15, 18, 0),
                            new FromIntegers(15, 59, 0)
                        )
                    ),
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(16, 0, 0),
                            new FromIntegers(17, 30, 0)
                        )
                    ),
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(17, 31, 0),
                            new FromIntegers(18, 30, 0)
                        )
                    ),
                    new DailyInLocalTimeZone(
                        new DefaultTimePeriod(
                            new FromIntegers(0, 0, 0),
                            new FromIntegers(3, 0, 0)
                        ),
                        new DefaultTimePeriod(
                            new FromIntegers(18, 31, 0),
                            new FromIntegers(23, 59, 59)
                        )
                    )
                ))
                    ->for($dateTime)
            )
        );
    }

    public function dateTimes()
    {
        return [
            [
                new FromISO8601('2019-12-02 00:17:01+0300'),
                [['22:28:00', '22:29:00'], ['11:00:00', '12:30:00'],]
            ],
            [
                new FromISO8601('2019-11-05 23:17:01-15:00'),
                [['14:08:00', '15:17:00'], ]
            ],
        ];
    }
}
