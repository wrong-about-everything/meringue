<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601Interval\WithFixedStartDateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\Floating\FromISO8601 as IntervalFromISO8601String;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromStartDateTimeAndInterval;
use PHPUnit\Framework\TestCase;

class FromStartDateTimeAndIntervalTest extends TestCase
{
    public function testCorrectFormat()
    {
        $interval =
            new FromStartDateTimeAndInterval(
                new FromISO8601('2020-04-20T21:01:19+03'),
                new IntervalFromISO8601String('P1YT1S')
            );

        $this->assertEquals(
            'P1YT1S',
            $interval->value()
        );
        $this->assertEquals(
            '2020-04-20T21:01:19+03:00',
            $interval->starts()->value()
        );
        $this->assertEquals(
            '2021-04-20T21:01:20+03:00',
            $interval->ends()->value()
        );
    }
}
