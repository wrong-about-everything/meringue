<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\InTimeZone;
use Meringue\ISO8601DateTime\TimeZone\Novosibirsk;
use PHPUnit\Framework\TestCase;

class InTimeZoneTest extends TestCase
{
    public function testSuccessfulConversion()
    {
        $this->assertEquals(
            '2018-04-25T19:08:01+07:00',
            (new InTimeZone(
                new FromISO8601('2018-04-25 15:08:01+03:00'),
                new Novosibirsk()
            ))
                ->value()
        );
    }
}
