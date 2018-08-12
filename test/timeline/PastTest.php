<?php

namespace ooDateTime\test\ISO8601DateTime;

use src\ISO8601DateTime\ISO8601Stub;
use src\ISO8601Interval\FromISO8601;
use src\timeline\Past;
use PHPUnit\Framework\TestCase;

class PastTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new Past(
                new ISO8601Stub('2014-11-21T06:04:31+00:00'),
                new FromISO8601('P1Y2M21DT24H56M26S')
            ))
                ->value(),
            '2013-08-30T05:08:05+00:00'
        );
    }
}
