<?php

namespace ooDateTime\test\comparison;

use src\comparison\Max;
use src\ISO8601Interval\FromISO8601;
use src\timeline\Now;
use src\timeline\Past;
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