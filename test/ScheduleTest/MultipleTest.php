<?php

declare(strict_types=1);

namespace Meringue\Tests\ScheduleTest;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;
use Meringue\Schedule\Multiple;
use Meringue\Timeline\Point\Now;
use PHPUnit\Framework\TestCase;

class MultipleTest extends TestCase
{
    public function testWithOneSuccessfulSchedule()
    {
        $this->assertTrue(
            (new Multiple(
                $this->schedule(true)
            ))
                ->isHit(new Now()));
    }

    public function testWithOneFailedSchedule()
    {
        $this->assertFalse(
            (new Multiple(
                $this->schedule(false)
            ))
                ->isHit(new Now()));
    }

    public function testWithSomeSchedulesAndOnlyOneIsSuccessful()
    {
        $this->assertTrue(
            (new Multiple(
                $this->schedule(false),
                $this->schedule(false),
                $this->schedule(true),
                $this->schedule(false)
            ))
                ->isHit(new Now()));
    }

    public function testWithSomeFailedSchedules()
    {
        $this->assertFalse(
            (new Multiple(
                $this->schedule(false),
                $this->schedule(false),
                $this->schedule(false),
                $this->schedule(false)
            ))
                ->isHit(new Now()));
    }



    private function schedule(bool $isHit)
    {
        return
            new class ($isHit) implements Schedule {
                private $isHit;

                public function __construct(bool $isHit)
                {
                    $this->isHit = $isHit;
                }

                public function isHit(ISO8601DateTime $dateTime): bool
                {
                    return $this->isHit;
                }
            };
    }
}
