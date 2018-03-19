<?php

namespace ooDateTime\test\formattedDateTime;

use ooDateTime\src\formattedDateTime\ToISO8601;
use ooDateTime\src\ISO8601DateTime\ISO8601Stub;
use PHPUnit\Framework\TestCase;

class ToISO8601Test extends TestCase
{
    public function testEquals()
    {
        $this->assertEquals(
            (new ToISO8601(
                new ISO8601Stub('2014-11-21T06:04:31+00:00')
            ))
                ->value(),
            '2014-11-21T06:04:31+00:00'
        );
    }
}