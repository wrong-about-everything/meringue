<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\ToISO8601;
use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;

class ToISO8601Test extends TestCase
{
    public function testEquals()
    {
        $this->assertEquals(
            (new ToISO8601(
                new FromISO8601('2014-11-21T06:04:31+00:00')
            ))
                ->value(),
            '2014-11-21T06:04:31+00:00'
        );
    }
}