<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\SecondsSinceJanuary1st1970;
use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class SecondsSinceJanuary1st1970Test extends TestCase
{
    public function testEqualsWithRoundSeconds()
    {
        $this->assertEquals(
            '1416549871',
            (new SecondsSinceJanuary1st1970(
                new FromISO8601('2014-11-21T06:04:31+00:00')
            ))
                ->value()
        );
    }

    public function testEqualsWithFractionSeconds()
    {
        $this->assertEquals(
            '1416549871.323154',
            (new SecondsSinceJanuary1st1970(
                new FromISO8601('2014-11-21T06:04:31.323154+00:00')
            ))
                ->value()
        );
    }
}