<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\Minute;
use src\formattedDateTime\Second;
use src\ISO8601DateTime\FromISO8601;

class MillisecondTest extends TestCase
{
    public function test()
    {
        $this->markTestIncomplete();

        $this->assertEquals(
            39,
            (new Second(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}