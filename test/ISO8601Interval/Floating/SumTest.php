<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601Interval\Floating;

use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\Floating\FromISO8601;
use Meringue\ISO8601Interval\Floating\Sum;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    /**
     * @dataProvider intervals
     */
    public function testIntervalsCreated(array $intervals, ISO8601Interval $interval)
    {
        $this->assertEquals(
            $interval->value(),
            (new Sum(
                ... $intervals
            ))
                ->value()
        );
    }

    public function intervals()
    {
        return [
            [
                [
                    new FromISO8601('P1Y2M34DT15H47M52S'),
                    new FromISO8601('P11M8DT3H5M17S'),
                    new FromISO8601('PT2H12M4S'),
                    new FromISO8601('PT1S')
                ],
                new FromISO8601('P1Y13M42DT20H64M74S')
            ],
            [
                [
                    new FromISO8601('PT26S'),
                    new FromISO8601('PT254S')
                ],
                new FromISO8601('P0Y0M0DT0H0M280S')
            ],
            [
                [
                    new FromISO8601('P1YT56M26S'),
                    new FromISO8601('PT379M251S')
                ],
                new FromISO8601('P1Y0M0DT0H435M277S')
            ],
        ];
    }
}