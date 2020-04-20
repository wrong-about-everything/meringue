<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\Microseconds;
use Meringue\FormattedInterval\ToMilliseconds;
use Meringue\FormattedInterval\FullSeconds;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;
use PHPUnit\Framework\TestCase;

class ToMillisecondsTest extends TestCase
{
    /**
     * @dataProvider rangesAndSeconds
     */
    public function test(WithFixedStartDateTime $range, int $expectedSeconds)
    {
        $this->assertEquals(
            $expectedSeconds,
            (new ToMilliseconds(
                $range
            ))
                ->value()
        );
    }

    public function rangesAndSeconds()
    {
        return
            [
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39.123456+00:00'),
                        new FromISO8601('2017-07-05T14:27:39.123457+00:00')
                    ),
                    172800000
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39.123456+00:00'),
                        new FromISO8601('2017-07-05T14:27:38.987654+00:00')
                    ),
                    172799864
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    172801000
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40.000001+00:00')
                    ),
                    1000
                ],
            ];
    }
}