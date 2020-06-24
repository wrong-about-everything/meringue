<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\Date\Week\FromISO8601DateTime;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\FromWeekAndDayOfAWeek;
use Meringue\WeekDay;
use Meringue\WeekDay\Friday;
use Meringue\WeekDay\Monday;
use Meringue\WeekDay\Saturday;
use Meringue\WeekDay\Sunday;
use Meringue\WeekDay\Thursday;
use Meringue\WeekDay\Tuesday;
use Meringue\WeekDay\Wednesday;
use PHPUnit\Framework\TestCase;

class FromWeekAndDayOfAWeekTest extends TestCase
{
    /**
     * @dataProvider daysOfWeek
     */
    public function testCorrectFormat(WeekDay $weekDay, ISO8601DateTime $expectedDateTime)
    {
        $this->assertEquals(
            $expectedDateTime->value(),
            (new FromWeekAndDayOfAWeek(
                new FromISO8601DateTime(
                    new FromISO8601('2020-06-25T23:59:54+07:30')
                ),
                $weekDay
            ))
                ->value()
        );
    }

    public function daysOfWeek()
    {
        return [
            [new Monday(), new FromISO8601('2020-06-22T00:00:00+07:30')],
            [new Tuesday(), new FromISO8601('2020-06-23T00:00:00+07:30')],
            [new Wednesday(), new FromISO8601('2020-06-24T00:00:00+07:30')],
            [new Thursday(), new FromISO8601('2020-06-25T00:00:00+07:30')],
            [new Friday(), new FromISO8601('2020-06-26T00:00:00+07:30')],
            [new Saturday(), new FromISO8601('2020-06-27T00:00:00+07:30')],
            [new Sunday(), new FromISO8601('2020-06-28T00:00:00+07:30')],
        ];
    }
}
