<?php

namespace ooDateTime\test\formattedDateTime;

use src\formattedDateTime\ToMilliseconds;
use src\ISO8601DateTime\ISO8601Stub;
use PHPUnit\Framework\TestCase;

class ToMillisecondsTest extends TestCase
{
    public function testEquals()
    {
        $this->assertEquals(
            (new ToMilliseconds(
                new ISO8601Stub('2014-11-21T06:04:31+00:00')
            ))
                ->value(),
            '1416549871'
        );
    }
}