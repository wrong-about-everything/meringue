<?php

namespace ooDateTime\test\ISO8601DateTime;

use ooDateTime\src\ISO8601Interval\FromISO8601;
use ooDateTime\src\timeline\Future;
use ooDateTime\src\timeline\Now;
use ooDateTime\src\timeline\Past;
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
                Min(
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
