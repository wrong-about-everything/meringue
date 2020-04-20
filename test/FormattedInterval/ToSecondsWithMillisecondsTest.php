<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\FullSeconds;
use Meringue\FormattedInterval\ToSecondsWithMilliseconds;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;
use PHPUnit\Framework\TestCase;

class ToSecondsWithMillisecondsTest extends TestCase
{
    /**
     * @dataProvider rangesAndSeconds
     */
    public function test(WithFixedStartDateTime $range, string $expectedSeconds)
    {
        $this->assertEquals(
            $expectedSeconds,
            (new ToSecondsWithMilliseconds(
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
                        new FromISO8601('2017-07-05T14:27:39.246912+00:00')
                    ),
                    '172800.123'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    '172799.000'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39.123987+00:00'),
                        new FromISO8601('2017-07-05T14:27:40.987654+00:00')
                    ),
                    '172801.863'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    '1.000'
                ],
            ];
    }
}