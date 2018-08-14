<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\Year;
use src\ISO8601DateTime\FromISO8601;

class YearTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            2017,
            (new Year(new FromISO8601('2017-07-03T14:27:39+00:00')))->full()
        );
    }

    public function testLeapYear()
    {
        $this->assertEquals(
            true,
            (new Year(new FromISO8601('2016-07-03T14:27:39+00:00')))->isLeap()
        );
    }

    public function testNonLeapYear()
    {
        $this->assertEquals(
            false,
            (new Year(new FromISO8601('2017-07-03T14:27:39+00:00')))->isLeap()
        );
    }
}