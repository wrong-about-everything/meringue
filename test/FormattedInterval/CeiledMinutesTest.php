<?php

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\CeiledMinutes;
use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\FromRange;
use Meringue\WithFixedStartDateTime;

class CeiledMinutesTest extends TestCase
{
    /**
     * @dataProvider rangesAndMinutes
     */
    public function test(WithFixedStartDateTime $range, $expectedMinutes)
    {
        $this->assertEquals(
            $expectedMinutes,
            (new CeiledMinutes(
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
                    2880
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    2880
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    2881
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    1
                ],
            ];
    }
}