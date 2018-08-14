<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\WeekOfYear;
use src\ISO8601DateTime\FromISO8601;

class WeekOfYearTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            33,
            (new WeekOfYear(new FromISO8601('2017-08-14T14:27:39+00:00')))->value()
        );
    }
}