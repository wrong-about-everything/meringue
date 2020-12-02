<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\TheFirstDayOfNMonthsLater;
use PHPUnit\Framework\TestCase;

class TheFirstDayOfNMonthsLaterTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, int $monthsLater, string $expected)
    {
        $this->assertEquals(
            $expected,
            (new TheFirstDayOfNMonthsLater($dateTime, $monthsLater))->value()
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2014-11-21'), 2, '2015-01-01T00:00:00+00:00'],
            [new FromISO8601('2014-12-31T23:28:04+07:00'), 1, '2015-01-01T00:00:00+07:00'],
            [new FromISO8601('2014-12-31T23:28:04+07:00'), 2, '2015-02-01T00:00:00+07:00'],
            [new FromISO8601('2014-12-31T23:28:04+07:00'), 3, '2015-03-01T00:00:00+07:00'],
            [new FromISO8601('2014-01-31T23:28:04+07:00'), 1, '2014-02-01T00:00:00+07:00'],
            [new FromISO8601('2014-01-31T23:28:04+07:00'), 2, '2014-03-01T00:00:00+07:00'],
            [new FromISO8601('2020-02-29T23:28:04+07:00'), 1, '2020-03-01T00:00:00+07:00'],
        ];
    }
}
