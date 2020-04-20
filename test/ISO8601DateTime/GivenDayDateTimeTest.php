<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\GivenDayDateTime;
use PHPUnit\Framework\TestCase;

class GivenDayDateTimeTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, $hours, $minutes, $seconds, $expected)
    {
        $this->assertEquals(
            (new GivenDayDateTime(
                $dateTime,
                $hours,
                $minutes,
                $seconds
            ))
                ->value(),
            $expected
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2014-11-21'), 7, 1, 5, '2014-11-21T07:01:05+00:00'],
            [new FromISO8601('2014-11-21'), 0, 0, 0, '2014-11-21T00:00:00+00:00'],
            [new FromISO8601('2014-05-28T01:28:04+07:00'), 0, 0, 0, '2014-05-28T00:00:00+07:00'],
        ];
    }
}
