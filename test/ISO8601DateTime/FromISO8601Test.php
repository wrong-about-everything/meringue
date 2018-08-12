<?php

namespace test\ISO8601DateTime;

use src\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;
use \Exception;

class FromISO8601Test extends TestCase
{
    public function testCorrectFormat()
    {
        $this->assertEquals(
            (new FromISO8601('2014-11-21T06:04:31+00:00'))
                ->value(),
            '2014-11-21T06:04:31+00:00'
        );
    }

    public function testWrongFormat()
    {
        try {
            (new FromISO8601('2014-11-21T06:04:31+00:s0'))->value();
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Datetime is not in ISO8601 format.');
    }
}
