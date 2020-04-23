<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\StartOfTheWeek;
use PHPUnit\Framework\TestCase;

class StartOfTheWeekTest extends TestCase
{
    /**
     * @dataProvider dateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, string $expected)
    {
        $this->assertEquals(
            $expected,
            (new StartOfTheWeek($dateTime))
                ->value()
        );
    }

    public function dateTimes()
    {
        return [
            [new FromISO8601('2020-04-23'), '2020-04-20T00:00:00+00:00'],
            [new FromISO8601('2020-04-23T01:28:04+07:00'), '2020-04-20T00:00:00+07:00'],
            [new FromISO8601('2020-04-20T01:28:04-11:30'), '2020-04-20T00:00:00-11:30'],
            [new FromISO8601('2020-04-26T23:59:59+04:30'), '2020-04-20T00:00:00+04:30'],
        ];
    }
}
