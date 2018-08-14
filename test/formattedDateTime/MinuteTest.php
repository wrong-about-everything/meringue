<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\Minute;
use src\ISO8601DateTime\FromISO8601;

class MinuteTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            27,
            (new Minute(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}