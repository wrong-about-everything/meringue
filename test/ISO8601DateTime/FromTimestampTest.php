<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\AdjustedAccordingToTimeZone;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\ISO8601DateTime\PhpSpecificTimeZone\HawaiiWithNoDST;
use Meringue\ISO8601DateTime\PhpSpecificTimeZone\Kaliningrad;
use PHPUnit\Framework\TestCase;
use \Throwable;

class FromTimestampTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            '2017-09-04T14:14:00+00:00',
            (new FromTimestamp(1504534440))
                ->value()
        );
        $this->assertEquals(
            '2017-09-04T16:14:00+02:00',
            (new AdjustedAccordingToTimeZone(
                new FromTimestamp(1504534440),
                new Kaliningrad()
            ))
                ->value()
        );
        $this->assertEquals(
            '2017-09-04T04:14:00-10:00',
            (new AdjustedAccordingToTimeZone(
                new FromTimestamp(1504534440),
                new HawaiiWithNoDST()
            ))
                ->value()
        );
    }

    public function testWrongFormat()
    {
        try {
            (new FromTimestamp('sdf4564df'))->value();
        } catch (Throwable $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Datetime is not represented in milliseconds.');
    }
}
