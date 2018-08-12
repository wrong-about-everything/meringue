<?php

namespace test\ISO8601Interval;

use src\ISO8601Interval\FromISO8601;
use PHPUnit\Framework\TestCase;

class FromISO8601Test extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new FromISO8601('P1Y2M21DT24H56M26S'))
                ->value(),
            'P1Y2M21DT24H56M26S'
        );
    }
}
