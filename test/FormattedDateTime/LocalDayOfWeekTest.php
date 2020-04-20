<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\LocalDayOfWeek;
use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;

class LocalDayOfWeekTest extends TestCase
{
    public function testInUTC()
    {
        $this->setLocale(LC_ALL, 'nl_NL');

        $this->assertEquals(
            2,
            (new LocalDayOfWeek(new FromISO8601('2018-08-14T14:27:39+00:00')))->numeric()
        );
    }

    public function testInMoscow()
    {
        // Sunday in Moscow, still Saturday in UTC
        $this->assertEquals(
            7,
            (new LocalDayOfWeek(new FromISO8601('2019-08-11T01:27:39+03:00')))->numeric()
        );
    }

    public function testInSanFrancisco()
    {
        // Sunday in San Francisco, already Monday in UTC
        $this->assertEquals(
            7,
            (new LocalDayOfWeek(new FromISO8601('2019-11-03T23:50:00-08:00')))->numeric()
        );
    }

    public function testInNovosibirsk()
    {
        // Sunday in Novosibirsk, still Saturday anywhere to the west
        $this->assertEquals(
            7,
            (new LocalDayOfWeek(new FromISO8601('2019-11-03T00:50:00+08:00')))->numeric()
        );
    }
}
