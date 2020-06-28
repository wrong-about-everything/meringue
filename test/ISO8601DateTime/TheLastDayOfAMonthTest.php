<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\TheLastDayOfAMonth;
use PHPUnit\Framework\TestCase;

class TheLastDayOfAMonthTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, string $expected)
    {
        $this->assertEquals(
            $expected,
            (new TheLastDayOfAMonth($dateTime))->value()
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2014-11-21'), '2014-11-30T00:00:00+00:00'],
            [new FromISO8601('2014-01-31T23:28:04+07:00'), '2014-01-31T00:00:00+07:00'],
            [new FromISO8601('2020-02-21T23:28:04+07:00'), '2020-02-29T00:00:00+07:00'],
        ];
    }
}
