<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\HumanReadable;
use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class HumanReadableTest extends TestCase
{
    /**
     * @dataProvider rangesAndFormattedIntervals
     */
    public function testWithOmittedZeroIntervalParts(WithFixedStartDateTime $range, string $humanReadableInterval)
    {
        $this->assertEquals(
            $humanReadableInterval,
            (new HumanReadable($range))
                ->value()
        );
    }

    public function rangesAndFormattedIntervals()
    {
        return
            [
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2018-07-05T14:27:39+00:00')
                    ),
                    '1 year and 2 days'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    '1 day, 23 hours, 59 minutes and 59 seconds'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    '2 days and 1 second'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    '1 second'
                ],
            ];
    }
}