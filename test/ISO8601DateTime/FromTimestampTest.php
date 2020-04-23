<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromTimestamp;
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
