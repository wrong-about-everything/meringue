<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\BeginningOfTheDay;
use PHPUnit\Framework\TestCase;

class BeginningOfTheDayTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            '2014-11-21T00:00:00-11:30',
            (new BeginningOfTheDay(new FromISO8601('2014-11-21 08:12:54-11:30')))->value()
        );
    }
}
