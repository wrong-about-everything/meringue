<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\TotalFullMinutes;
use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalFullMinutesTest extends TestCase
{
    /**
     * @dataProvider rangesAndMinutes
     */
    public function test(WithFixedStartDateTime $range, $expectedMinutes)
    {
        $this->assertEquals(
            $expectedMinutes,
            (new TotalFullMinutes(
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
                    2879
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    2880
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    0
                ],
            ];
    }
}