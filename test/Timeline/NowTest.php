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
        for ($i = 0; $i < 100000; $i++) {
            $now = new Now();
            $this->assertTrue(
                Max(
                    new Past(
                        $now,
                        new FromISO8601('PT1S')
                    ),
                    new Min(
                        $now,
                        new Future(
                            $now,
                            new FromISO8601('PT1S')
                        )
                    )
                )
                    ->equalsTo($now)
            );
        }
    }
}
