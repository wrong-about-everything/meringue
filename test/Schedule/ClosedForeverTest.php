<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Schedule\Closed;
use PHPUnit\Framework\TestCase;

class ClosedForeverTest extends TestCase
{
    /**
     * @dataProvider dateTimes
     */
    public function testIsNotHit(ISO8601DateTime $dateTime)
    {
        $this->assertFalse(
            (new Closed())
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
