<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\FromRange;
use Meringue\Schedule\Daily;
use Meringue\Schedule\Monthly;
use Meringue\Schedule\TwentyFourSeven;
use Meringue\Time;
use Meringue\Time\DefaultTime;
use PHPUnit\Framework\TestCase;

class MonthlyTest extends TestCase
{
    public function testIsHit()
    {
        $this->markTestSkipped();
    }
}
