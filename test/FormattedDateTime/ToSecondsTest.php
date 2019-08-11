<?php

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\ToSeconds;
use Meringue\ISO8601DateTime\ISO8601Stub;
use PHPUnit\Framework\TestCase;

class ToSecondsTest extends TestCase
{
    public function testEqualsWithRoundSeconds()
    {
        $this->assertEquals(
            (new ToSeconds(
                new ISO8601Stub('2014-11-21T06:04:31+00:00')
            ))
                ->value(),
            '1416549871'
        );
    }

    public function testEqualsWithFractionSeconds()
    {
        $this->assertEquals(
            (new ToSeconds(
                new ISO8601Stub('2014-11-21T06:04:31.323154+00:00')
            ))
                ->value(),
            '1416549871.323154'
        );
    }
}