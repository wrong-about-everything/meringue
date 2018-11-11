<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\Month;
use src\ISO8601DateTime\FromISO8601;

class MonthTest extends TestCase
{
    public function testNumeric()
    {
        $this->assertEquals(
            7,
            (new Month(new FromISO8601('2017-07-03T14:27:39+00:00')))->numeric()
        );
    }

    public function testTextual()
    {
        $this->setLocale(LC_ALL, 'nl_NL');

        $this->assertEquals(
            'juli',
            (new Month(new FromISO8601('2017-07-03T14:27:39+00:00')))->fullName()
        );
    }

    public function testNumberOfDays()
    {
        $this->assertEquals(
            31,
            (new Month(new FromISO8601('2017-07-03T14:27:39+00:00')))->numberOfDays()
        );
    }
}