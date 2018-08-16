<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\Time;
use src\ISO8601DateTime\FromISO8601;

class TimeTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            '14:27:39+04:30',
            (new Time(new FromISO8601('2017-07-03T14:27:39+04:30')))->value()
        );
    }
}