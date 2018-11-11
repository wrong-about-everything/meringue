<?php

namespace test\formattedDateTime;

use PHPUnit\Framework\TestCase;
use src\formattedDateTime\DayOfWeek;
use src\formattedDateTime\WithCallback;
use src\ISO8601DateTime;
use src\ISO8601DateTime\FromISO8601;

class WithCallbackTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            'Сегодня четвержочек',
            (new WithCallback(
                new FromISO8601('2018-08-16T14:27:39+04:30'),
                function (ISO8601DateTime $dateTime) {
                    if ((new DayOfWeek($dateTime))->numeric() == 4) {
                        return 'Сегодня четвержочек';
                    }

                    return 'Сегодня не четвержочек';
                }
            ))
                ->value()
        );
    }
}