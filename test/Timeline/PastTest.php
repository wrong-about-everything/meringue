<?php

declare(strict_types=1);

namespace Meringue\Tests\Timeline;

use Meringue\ISO8601DateTime\FromISO8601 as DateTimeFromISO8601String;
use Meringue\ISO8601Interval\Floating\FromISO8601;
use Meringue\Timeline\Point\Past;
use PHPUnit\Framework\TestCase;

class PastTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new Past(
                new DateTimeFromISO8601String('2014-11-21T06:04:31+00:00'),
                new FromISO8601('P1Y2M21DT24H56M26S')
            ))
                ->value(),
            '2013-08-30T05:08:05+00:00'
        );
    }
}
