<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedInterval\TotalFullDays;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalFullDaysTest extends TestCase
{
    /**
     * @dataProvider rangesAndDays
     */
    public function test(WithFixedStartDateTime $range, int $days)
    {
        $this->assertEquals(
            $days,
            (new TotalFullDays(
                $range
            ))
                ->value()
        );
    }

    public function rangesAndDays()
    {
        return
            [
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:39+00:00')
                    ),
                    2
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    1
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    2
                ],
            ];
    }
}