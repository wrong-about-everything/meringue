<?php

namespace Meringue\Tests\FormattedInterval;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedInterval\ToDays;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\FromRange;
use Meringue\WithFixedStartDateTime;

class ToDaysTest extends TestCase
{
    /**
     * @dataProvider rangesAndDays
     */
    public function test(WithFixedStartDateTime $range, int $days)
    {
        $this->assertEquals(
            $days,
            (new ToDays(
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