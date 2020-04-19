<?php

namespace Meringue\Tests\Timeline;

use Meringue\ISO8601DateTime\Min;
use Meringue\ISO8601Interval\Floating\FromISO8601;
use Meringue\Timeline\Point\Future;
use Meringue\Timeline\Point\Now;
use Meringue\Timeline\Point\Past;
use PHPUnit\Framework\TestCase;

class NowTest extends TestCase
{
    public function testCorrectFormat()
    {
        for ($i = 0; $i < 1000; $i++) {
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
