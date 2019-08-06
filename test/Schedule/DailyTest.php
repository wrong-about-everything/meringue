<?php

declare(strict_types=1);

namespace Meringue\Tests\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;
use Meringue\Schedule\Daily;
use Meringue\Time\DefaultTime;
use Meringue\Timeline\Point\Now;
use PHPUnit\Framework\TestCase;
use Meringue\Schedule\TimePeriod;
use Meringue\ISO8601DateTime\FromISO8601;

class DailyTest extends TestCase
{
    public function testWithOneSuccessfulSchedule()
    {
        $this->assertTrue(
            (new Daily(
                $this->timePeriod(10, 12)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00')));
    }

    public function testWithSomeSuccessfulSchedules()
    {
        $this->assertTrue(
            (new Daily(
                $this->timePeriod(11, 12),
                $this->timePeriod(10, 13),
                $this->timePeriod(10, 19)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00')));
    }

    public function testWithSomeSchedulesAndOnlyOneIsSuccessful()
    {
        $this->assertTrue(
            (new Daily(
                $this->timePeriod(0, 7),
                $this->timePeriod(11, 12),
                $this->timePeriod(14, 19)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00')));
    }

    public function testWithFailedSchedules()
    {
        $this->assertFalse(
            (new Daily(
                $this->timePeriod(0, 7),
                $this->timePeriod(12, 23)
            ))
                ->isHit(new FromISO8601('2019-01-01T11:00:00')));
    }

    private function timePeriod(int $fromHour, int $toHour)
    {
        return
            new TimePeriod(
                new DefaultTime($fromHour, 0, 0),
                new DefaultTime($toHour, 0, 0)
            );
    }
}
