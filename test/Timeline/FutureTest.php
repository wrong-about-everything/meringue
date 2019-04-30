<?php

namespace Meringue\Tests\Timeline;

use Meringue\ISO8601DateTime\ISO8601Stub;
use Meringue\ISO8601Interval\FromISO8601;
use Meringue\Timeline\Future;
use PHPUnit\Framework\TestCase;

class FutureTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new Future(
                new ISO8601Stub('2014-11-21T06:04:31.321987+00:00'),
                new FromISO8601('P1Y2M21DT24H56M26S')
            ))
                ->value(),
            '2016-02-12T07:00:57.321987+00:00'
        );
    }
}
