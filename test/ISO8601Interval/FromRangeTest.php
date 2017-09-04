<?php

namespace ooDateTime\test\ISO8601Interval;

use ooDateTime\src\ISO8601DateTime\ISO8601Stub;
use ooDateTime\src\ISO8601Interval\FromRange;
use PHPUnit\Framework\TestCase;
use \Exception;

class FromRangeTest extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new FromRange(
                new ISO8601Stub('2017-07-03T14:27:39+00:00'),
                new ISO8601Stub('2017-08-28T14:29:47+00:00')
            ))
                ->value(),
            'P0Y1M25DT0H2M8S'
        );
    }

    public function testWrongFormat()
    {
        try {
            (new FromRange(
                new ISO8601Stub('2017-09-03T14:27:39+00:00'),
                new ISO8601Stub('2017-08-28T14:29:47+00:00')
            ))
                ->value();
        } catch (Exception $e) {
            return;
        }

        $this->fail('End date is larger than start date.');
    }
}
