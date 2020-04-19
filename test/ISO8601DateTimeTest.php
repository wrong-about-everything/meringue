<?php

declare(strict_types=1);

namespace Meringue\Tests;

use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class ISO8601DateTimeTest extends TestCase
{
    public function testEqualDates()
    {
        $this->assertTrue(
            (new FromISO8601('2019-09-01T10:30:00+03:00'))
                ->equalsTo(
                    new FromISO8601('2019-09-01T10:30:00+03:00')
                )
        );
    }

    public function testNonEqualDates()
    {
        $this->assertFalse(
            (new FromISO8601('2019-09-01T10:30:00+03:00'))
                ->equalsTo(
                    new FromISO8601('2019-09-01T10:30:00+02:00')
                )
        );
        $this->assertFalse(
            (new FromISO8601('2019-09-01T10:30:00+03:00'))
                ->laterThan(
                    new FromISO8601('2019-09-01T10:30:00+02:00')
                )
        );
        $this->assertTrue(
            (new FromISO8601('2019-09-01T10:30:00+02:00'))
                ->laterThan(
                    new FromISO8601('2019-09-01T10:30:00+03:00')
                )
        );
    }
}
