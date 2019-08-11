<?php

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\ToMicroseconds;
use Meringue\ISO8601DateTime\ISO8601Stub;
use PHPUnit\Framework\TestCase;

class ToMicrosecondsTest extends TestCase
{
    public function testEquals()
    {
        $this->assertEquals(
            (new ToMicroseconds(
                new ISO8601Stub('2014-11-21T06:04:31.123456+00:00')
            ))
                ->value(),
            '1416549871123456'
        );
    }
}