<?php

namespace Meringue\Tests\Timeline;

use Meringue\Comparison\Min;
use Meringue\ISO8601Interval\FromISO8601;
use Meringue\Timeline\Future;
use Meringue\Timeline\Now;
use Meringue\Timeline\Past;
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
