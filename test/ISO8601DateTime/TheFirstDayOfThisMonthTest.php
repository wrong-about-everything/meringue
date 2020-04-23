<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\TheFirstDayOfThisMonth;
use PHPUnit\Framework\TestCase;

class TheFirstDayOfThisMonthTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, string $expected)
    {
        $this->assertEquals(
            $expected,
            (new TheFirstDayOfThisMonth($dateTime))->value()
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2014-11-21'), '2014-11-01T00:00:00+00:00'],
            [new FromISO8601('2014-01-31T23:28:04+07:00'), '2014-01-01T00:00:00+07:00'],
        ];
    }
}
