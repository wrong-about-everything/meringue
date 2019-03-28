<?php

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\NextDayDateTime;
use PHPUnit\Framework\TestCase;

class NextDayDateTimeTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, $hours, $minutes, $seconds, $timezone, $expected)
    {
        $this->assertEquals(
            (new NextDayDateTime(
                $dateTime,
                $hours,
                $minutes,
                $seconds,
                $timezone
            ))
                ->value(),
            $expected
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2014-11-21'), 7, 1, 5, 3, '2014-11-22T07:01:05+03:00'],
            [new FromISO8601('2014-11-21'), 0, 0, 0, 3, '2014-11-22T00:00:00+03:00'],
            [new FromISO8601('2014-11-21'), 0, 0, 0, -3, '2014-11-22T00:00:00-03:00'],
        ];
    }
}
