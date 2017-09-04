<?php

namespace ooDateTime\test\comparison;

use ooDateTime\src\comparison\Max;
use ooDateTime\src\ISO8601Interval\FromISO8601;
use ooDateTime\src\timeline\Now;
use ooDateTime\src\timeline\Past;
use PHPUnit\Framework\TestCase;

class MaxTest extends TestCase
{
    public function testEquals()
    {
        $this->assertTrue(
            (new Max(
                new Now(),
                new Past(
                    new Now(),
                    new FromISO8601('PT1S')
                )
            ))
                ->equalsTo(new Now())
        );
    }
}