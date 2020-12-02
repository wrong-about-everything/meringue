<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\Date\DefaultDate;
use Meringue\Date\Year\FromInt as Year;
use Meringue\Date\Month\FromInt as Month;
use Meringue\Date\Day\FromInt as Day;
use Meringue\ISO8601DateTime\FromLocalDateAndTime;
use Meringue\ISO8601DateTime\TimeZone\FromString;
use Meringue\Time\FromIntegers;
use PHPUnit\Framework\TestCase;

class FromLocalDateAndTimeTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            '2020-11-30T05:48:54+03:00',
            (new FromLocalDateAndTime(
                new DefaultDate(
                    new Year(2020), new Month(11), new Day(30)
                ),
                new FromIntegers(5, 48, 54),
                new FromString('+03:00')
            ))
                ->value()
        );
    }
}
