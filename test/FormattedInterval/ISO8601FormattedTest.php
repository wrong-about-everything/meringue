<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\ISO8601Formatted;
use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class ISO8601FormattedTest extends TestCase
{
    /**
     * @dataProvider rangesAndFormattedIntervals
     */
    public function testWithOmittedZeroIntervalParts(WithFixedStartDateTime $range, callable $callback, string $formattedInterval)
    {
        $this->assertEquals(
            $formattedInterval,
            (new ISO8601Formatted($range, $callback))
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
                        new FromISO8601('2018-07-05T14:27:39.235487+00:00')
                    ),
                    function (int $years, int $months, int $days, int $hours, int $minutes, int $seconds) {
                        return $years >= 1 ? 'More than a year' : 'Less than a year';
                    },
                    'More than a year'
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    function (int $years, int $months, int $days, int $hours, int $minutes, int $seconds) {
                        return
                            sprintf(
                                '%d great day, %d great hours, %d great minutes, and %d great seconds!',
                                $days,
                                $hours,
                                $minutes,
                                $seconds
                            );
                    },
                    '1 great day, 23 great hours, 59 great minutes, and 59 great seconds!'
                ],
            ];
    }
}