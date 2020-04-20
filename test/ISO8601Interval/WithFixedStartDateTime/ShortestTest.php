<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601Interval\WithFixedStartDateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\Floating\FromISO8601 as IntervalFromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromStartDateTimeAndInterval;
use Meringue\ISO8601Interval\WithFixedStartDateTime\Shortest;
use PHPUnit\Framework\TestCase;

class ShortestTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new FromStartDateTimeAndInterval(
                new FromISO8601('2020-04-02 12:03:54+03'),
                new IntervalFromISO8601('PT1S')
            ))
                ->value(),
            (new Shortest(
                new FromStartDateTimeAndInterval(
                    new FromISO8601('2020-04-02 12:03:54+03'),
                    new IntervalFromISO8601('P1DT1M')
                ),
                new FromStartDateTimeAndInterval(
                    new FromISO8601('2020-04-02 12:03:54+03'),
                    new IntervalFromISO8601('PT1S')
                ),
                new FromStartDateTimeAndInterval(
                    new FromISO8601('2020-04-02 12:03:54+03'),
                    new IntervalFromISO8601('P1YT2S')
                ),
                new FromStartDateTimeAndInterval(
                    new FromISO8601('2020-04-02 12:03:54+03'),
                    new IntervalFromISO8601('PT2S')
                )
            ))
                ->value()
        );
    }
}
