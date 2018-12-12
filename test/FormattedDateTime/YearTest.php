<?php

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Year;
use Meringue\ISO8601DateTime\FromISO8601;

class YearTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            2017,
            (Year::fromIso8601DateTime(new FromISO8601('2017-07-03T14:27:39+00:00')))->full()
        );
    }

    public function testLeapYear()
    {
        $this->assertEquals(
            true,
            (Year::fromIso8601DateTime(new FromISO8601('2016-07-03T14:27:39+00:00')))->isLeap()
        );
    }

    public function testNonLeapYear()
    {
        $this->assertEquals(
            false,
            (Year::fromIso8601DateTime(new FromISO8601('2017-07-03T14:27:39+00:00')))->isLeap()
        );
    }

    public function testEquality()
    {
        $this->assertTrue(
            (Year::fromIso8601DateTime(new FromISO8601('2017-07-03T14:27:39+00:00')))->equalsTo(Year::fromInt(2017))
        );
    }
}