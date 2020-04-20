<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\DayOfWeekInUTC;
use Meringue\ISO8601DateTime\FromISO8601;

class DayOfWeekInUTCTest extends TestCase
{
    public function testInUTC()
    {
        $this->setLocale(LC_ALL, 'nl_NL');

        $this->assertEquals(
            'dinsdag',
            (new DayOfWeekInUTC(new FromISO8601('2018-08-14T14:27:39+00:00')))->fullName()
        );
    }

    public function testInMoscow()
    {
        // Sunday in Moscow, still Saturday in UTC
        $this->assertEquals(
            6,
            (new DayOfWeekInUTC(new FromISO8601('2019-08-11T01:27:39+03:00')))->numeric()
        );
    }
}
