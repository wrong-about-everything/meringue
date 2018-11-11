<?php

namespace test\timeline;

use Meringue\comparison\Min;
use Meringue\ISO8601Interval\FromISO8601;
use Meringue\timeline\Future;
use Meringue\timeline\Now;
use Meringue\timeline\Past;
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
