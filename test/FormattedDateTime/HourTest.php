<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Hour;
use Meringue\ISO8601DateTime\FromISO8601;

class HourTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            14,
            (new Hour(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}