<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FixedDateTimeWithSpecifiedTimeZone;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\PhpSpecificTimeZone\CET;
use PHPUnit\Framework\TestCase;

class FixedDateTimeWithSpecifiedTimeZoneTest extends TestCase
{
    public function testSuccessfulConversion()
    {
        $this->assertEquals(
            '2018-04-25T15:08:01+01:00',
            (new FixedDateTimeWithSpecifiedTimeZone(
                new FromISO8601('2018-04-25 15:08:01+03:00'),
                new CET()
            ))
                ->value()
        );
    }
}
