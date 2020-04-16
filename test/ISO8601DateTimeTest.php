<?php

declare(strict_types=1);

namespace Meringue\Tests;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class ISO8601DateTimeTest extends TestCase
{
    public function testSuccessfulIsBetweenMethod()
    {
        $this->assertTrue(
            (new FromISO8601('2019-09-01T10:30:00+03:00'))
                ->isBetween(
                    new FromISO8601('2019-09-01T10:29:59+03:00'),
                    new FromISO8601('2019-09-01T10:30:00+03:00')
                )
        );
    }

    /** @dataProvider nonSuccessfulDatetimes */
    public function testFailedIsBetweenMethod(ISO8601DateTime $dateFrom, ISO8601DateTime $dateTo)
    {
        $this->assertFalse(
            (new FromISO8601('2019-09-01T10:30:00+03:00'))
                ->isBetween($dateFrom, $dateTo)
        );
    }

    public function nonSuccessfulDatetimes()
    {
        return [
            [new FromISO8601('2019-09-01T10:00:00+00:00'), new FromISO8601('2019-09-01T11:00:00+00:00')],
            [new FromISO8601('2019-09-01T10:30:00.001+03:00'), new FromISO8601('2019-09-01T10:30:01+03:00')],
            [new FromISO8601('2019-09-01T10:00:00+03:00'), new FromISO8601('2019-09-01T10:29:59.999999+03:00')],
            [new FromISO8601('2019-09-02T10:00:00+03:00'), new FromISO8601('2019-09-02T11:00:00+03:00')],
            [new FromISO8601('2019-08-31T10:00:00+03:00'), new FromISO8601('2019-08-31T11:00:00+03:00')],
        ];
    }
}
