<?php

namespace Meringue\Tests\FormattedInterval\Minutes;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedInterval\Minutes\ToFloat;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\FromRange;
use Meringue\WithFixedStartDateTime;

class ToFloatTest extends TestCase
{
    /**
     * @dataProvider rangesAndMinutes
     */
    public function test(WithFixedStartDateTime $range, float $expectedMinutes)
    {
        $this->assertEquals(
            $expectedMinutes,
            (new ToFloat(
                $range
            ))
                ->value()
        );
    }

    public function rangesAndMinutes()
    {
        return
            [
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:39+00:00')
                    ),
                    2880.00
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    2879.98
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    2880.01
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    0.01
                ],
            ];
    }
}