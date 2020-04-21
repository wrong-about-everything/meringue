<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\GivenDayDateTime;
use Meringue\ISO8601DateTime\StartOfTheDay;
use PHPUnit\Framework\TestCase;

class StartOfTheDayTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new StartOfTheDay(new FromISO8601('2014-11-21 08:12:54-11:30')))->value(),
            '2014-11-21 00:00:00-11:30'
        );
    }
}
