<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\formattedDateTime\DayOfWeek;
use Meringue\ISO8601DateTime\FromISO8601;

class DayOfWeekTest extends TestCase
{
    public function test()
    {
        $this->setLocale(LC_ALL, 'nl_NL');

        $this->assertEquals(
            'dinsdag',
            (new DayOfWeek(new FromISO8601('2018-08-14T14:27:39+00:00')))->fullName()
        );
    }
}