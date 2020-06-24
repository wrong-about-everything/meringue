<?php

declare(strict_types=1);

namespace Meringue\Tests\Date\Week;

use Meringue\Date\Week\FromISO8601DateTime;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class ByDateTimeTest extends TestCase
{
    /**
     * @dataProvider dateTimes
     */
    public function test(ISO8601DateTime $dateTime, ISO8601DateTime $dateTimeOfWeeksMonday)
    {
        $this->assertEquals(
            $dateTimeOfWeeksMonday->value(),
            (new FromISO8601DateTime($dateTime))->value()
        );
    }

    public function dateTimes()
    {
        return [
            [new FromISO8601('2020-06-22T15:47:11+07:30'), new FromISO8601('2020-06-22T00:00:00+07:30')],
            [new FromISO8601('2020-06-23T15:47:11+07:30'), new FromISO8601('2020-06-22T00:00:00+07:30')],
            [new FromISO8601('2020-06-24T15:47:11+07:30'), new FromISO8601('2020-06-22T00:00:00+07:30')],
            [new FromISO8601('2020-06-27T15:47:11+07:30'), new FromISO8601('2020-06-22T00:00:00+07:30')],
            [new FromISO8601('2020-06-28T15:47:11+07:30'), new FromISO8601('2020-06-22T00:00:00+07:30')],
        ];
    }
}