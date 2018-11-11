<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\DayOfMonth;
use src\ISO8601DateTime\FromISO8601;

class DayOfMonthTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            3,
            (new DayOfMonth(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}