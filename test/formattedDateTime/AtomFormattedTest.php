<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\formattedDateTime\AtomFormatted;
use Meringue\formattedDateTime\Year;
use Meringue\ISO8601DateTime\FromISO8601;

class AtomFormattedTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            '2017-07-03T14:27:39+04:30',
            (new AtomFormatted(new FromISO8601('2017-07-03T14:27:39+04:30')))->value()
        );
    }
}