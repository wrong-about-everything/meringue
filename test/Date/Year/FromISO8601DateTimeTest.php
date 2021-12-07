<?php

declare(strict_types=1);

namespace Meringue\Tests\Date\Year;

use Meringue\Date\Year\FromISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class FromISO8601DateTimeTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            2020,
            (new FromISO8601DateTime(
                new FromISO8601('2020-01-01 00:01:47+11')
            ))
                ->value()
        );
    }
}