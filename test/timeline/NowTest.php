<?php

namespace test\timeline;

use src\comparison\Min;
use src\ISO8601Interval\FromISO8601;
use src\timeline\Future;
use src\timeline\Now;
use src\timeline\Past;
use PHPUnit\Framework\TestCase;

class NowTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertTrue(
            Max(
                new Past(
                    new Now(),
                    new FromISO8601('PT1S')
                ),
                new Min(
                    new Now(),
                    new Future(
                        new Now(),
                        new FromISO8601('PT1S')
                    )
                )
            )
                ->equalsTo(new Now())
        );
    }
}
