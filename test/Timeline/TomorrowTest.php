<?php

namespace Meringue\Tests\Timeline;

use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromISO8601;

class TomorrowTest extends TestCase
{
    public function testWithTimezone()
    {
        $this->markTestIncomplete();

        $oneAmInMoscow = new FromISO8601('2018-11-21T01:04:31+04:00');

        // Tomorrow is always the next from now. The only thing to consider is where is this now happens -- where I am or somewhere else.
        // But it's hard to test. So probably NextDay class would be enough for the purpose that Tomorrow serves,
        // and it's definitely way more testable.

        (new Today('Moscow'))->equalsTo(new NextDay($oneAmInMoscow, new Timezone('London')));

    }
}