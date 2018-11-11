<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\formattedDateTime\Date;
use Meringue\ISO8601DateTime\FromISO8601;

class DateTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            '2017-07-03',
            (new Date(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}