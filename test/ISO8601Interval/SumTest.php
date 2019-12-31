<?php

namespace Meringue\Tests\ISO8601Interval;

use Meringue\ISO8601Interval\FromISO8601;
use Meringue\ISO8601Interval\Sum;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new Sum(
                new FromISO8601('P1Y2M21DT24H56M26S'),
                new FromISO8601('P2DT37H124M254S')
            ))
                ->value(),
            'P1Y2M28DT16H4M40S'
        );
    }
}
