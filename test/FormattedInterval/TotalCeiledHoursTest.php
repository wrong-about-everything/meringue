<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\TotalCeiledHours;
use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalCeiledHoursTest extends TestCase
{
    /**
     * @dataProvider rangesAndHours
     */
    public function test(WithFixedStartDateTime $range, int $days)
    {
        $this->assertEquals(
            $days,
            (new TotalCeiledHours($range))->value()
        );
    }

    public function rangesAndHours()
    {
        return
            [
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:39+00:00')
                    ),
                    48
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    48
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    49
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-06-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:39+00:00')
                    ),
                    720
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-02-14T14:27:39+00:00'),
                        new FromISO8601('2017-03-14T14:27:39+00:00')
                    ),
                    672
                ],
                [
                    new FromRange(
                        new FromISO8601('2020-02-14T14:27:39+00:00'),
                        new FromISO8601('2020-03-14T14:27:39+00:00')
                    ),
                    696
                ],
            ];
    }
}