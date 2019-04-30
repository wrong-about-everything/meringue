<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\ClosedForever;
use PHPUnit\Framework\TestCase;

class ClosedForeverTest extends TestCase
{
    /**
     * @dataProvider dateTimes
     */
    public function testIsNotHit(ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new ClosedForever())
                ->isHit($dateTime)
        );
    }

    public function dateTimes()
    {
        return [
            [new FromTimestamp(0)],
            [new FromISO8601('2019-01-01 00:00:00')],
        ];
    }
}
