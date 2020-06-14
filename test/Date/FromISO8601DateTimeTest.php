<?php

declare(strict_types=1);

namespace Meringue\Tests\Date;

use PHPUnit\Framework\TestCase;
use Meringue\Date\FromISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;

class FromISO8601DateTimeTest extends TestCase
{
    /** @dataProvider equalDates */
    public function testEquals(string $left, string $right)
    {
        $leftDate = new FromISO8601DateTime(new FromISO8601($left));
        $rightDate = new FromISO8601DateTime(new FromISO8601($right));

        $this->assertTrue($leftDate->equals($rightDate));
        $this->assertFalse($leftDate->lessThan($rightDate));
        $this->assertFalse($leftDate->greaterThan($rightDate));
    }

    public function equalDates()
    {
        return [
            ['2017-07-03T23:59:59+00:00', '2017-07-03T00:00:00+00:00'],
            ['2017-07-03T00:00:00+00:00', '2017-07-03T23:59:59+00:00'],
            ['2017-07-03T00:00:00+12:00', '2017-07-03T23:59:59-11:30'],
        ];
    }

    /** @dataProvider leftGreaterThenRight */
    public function testLeftIsGreaterThenRight(string $left, string $right)
    {
        $leftDate = new FromISO8601DateTime(new FromISO8601($left));
        $rightDate = new FromISO8601DateTime(new FromISO8601($right));

        $this->assertFalse($leftDate->equals($rightDate));
        $this->assertFalse($leftDate->lessThan($rightDate));
        $this->assertTrue($leftDate->greaterThan($rightDate));
    }

    public function leftGreaterThenRight()
    {
        return [
            ['2017-07-04T23:59:59+00:00', '2017-07-03T00:00:00+00:00'],
            ['2019-07-03T00:00:00+00:00', '2017-07-03T23:59:59+00:00'],
            ['2017-08-03T00:00:00+12:00', '2017-07-03T23:59:59-11:30'],
        ];
    }
}