<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\TheFirstDayOfNMonthsAgo;
use PHPUnit\Framework\TestCase;

class TheFirstDayOfNMonthsAgoTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, int $monthsLater, string $expected)
    {
        $this->assertEquals(
            $expected,
            (new TheFirstDayOfNMonthsAgo($dateTime, $monthsLater))->value()
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2018-03-01'), 2, '2018-01-01T00:00:00+00:00'],
            [new FromISO8601('2020-03-01T01:08:04+07:00'), 1, '2020-02-01T00:00:00+07:00'],
            [new FromISO8601('2020-03-31T23:28:04-11:30'), 11, '2019-04-01T00:00:00-11:30'],
        ];
    }
}
