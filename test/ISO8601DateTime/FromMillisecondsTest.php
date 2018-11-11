<?php

namespace test\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromMilliseconds;
use PHPUnit\Framework\TestCase;
use \Throwable;

class FromMillisecondsTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new FromMilliseconds(1504534440))
                ->value(),
            '2017-09-04T14:14:00+00:00'
        );
    }

    public function testWrongFormat()
    {
        try {
            (new FromMilliseconds('sdf4564df'))->value();
        } catch (Throwable $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Datetime is not represented in milliseconds.');
    }
}
