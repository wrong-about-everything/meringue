<?php

namespace ooDateTime\test\comparison;

use src\comparison\Min;
use src\ISO8601Interval\FromISO8601;
use src\timeline\Future;
use src\timeline\Now;
use PHPUnit\Framework\TestCase;

class MinTest extends TestCase
{
    public function testEquals()
    {
        $this->assertTrue(
            (new Min(
                new Now(),
                new Future(
                    new Now(),
                    new FromISO8601('PT1S')
                )
            ))
                ->equalsTo(new Now())
        );
    }
}