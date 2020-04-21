<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\MicrosecondsSinceJanuary1st1970;
use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class MicrosecondsSinceJanuary1st1970Test extends TestCase
{
    public function testEquals()
    {
        $this->assertEquals(
            (new MicrosecondsSinceJanuary1st1970(
                new FromISO8601('2014-11-21T06:04:31.123456+00:00')
            ))
                ->value(),
            '1416549871123456'
        );
    }

    public function testMaxDateTime()
    {
        $this->assertEquals(
            (new MicrosecondsSinceJanuary1st1970(
                new FromISO8601('9999-12-31T23:59:59.999999+00:00')
            ))
                ->value(),
            '253402300799999999'
        );
    }
}