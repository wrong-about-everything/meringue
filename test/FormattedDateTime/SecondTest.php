<?php

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Minute;
use Meringue\FormattedDateTime\Second;
use Meringue\ISO8601DateTime\FromISO8601;

class SecondTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            39,
            (new Second(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}