<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601Interval\Floating;

use Meringue\ISO8601Interval\Floating\FromISO8601;
use PHPUnit\Framework\TestCase;

class FromISO8601Test extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            'P1Y2M21DT24H56M26S',
            (new FromISO8601('P1Y2M21DT24H56M26S'))
                ->value()
        );
    }
}
