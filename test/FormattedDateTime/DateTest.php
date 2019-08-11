<?php

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Date;
use Meringue\ISO8601DateTime\FromISO8601;

class DateTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            '2017-07-03',
            (new Date(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }

    /** @dataProvider dataWithEqualsResult */
    public function testEquals(string $time1, string $time2, bool $expectedResult)
    {
        $this->assertEquals($expectedResult, (new Date(new FromISO8601($time1)))->equalsTo(new FromISO8601($time2)));
    }

    public function dataWithEqualsResult()
    {
        return [
            ['2017-07-03T23:59:59+00:00', '2017-07-03T00:00:00+00:00', true],
            ['2017-07-03T00:00:00+00:00', '2017-07-03T23:59:59+00:00', true],
            ['2017-07-02T00:00:00+00:00', '2017-07-03T23:59:59+00:00', false],
        ];
    }
}