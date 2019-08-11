<?php

namespace Meringue\Tests\FormattedDateTime;

use Meringue\FormattedDateTime\CanonicalISO8601DateTime;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable as PhpDateTime;

class CanonicalISO8601DateTimeTest extends TestCase
{
    /**
     * @dataProvider validIso8601DateTimesWithCanonicalRepresentation
     */
    public function testEquals(string $dateTime, string $canonical)
    {
        $this->assertEquals(
            (new CanonicalISO8601DateTime(
                new PhpDateTime($dateTime)
            ))
                ->value(),
            $canonical
        );
    }

    public function validIso8601DateTimesWithCanonicalRepresentation()
    {
        return [
            ['2018-12-31T23:12:59.321654+02:00', '2018-12-31T23:12:59.321654+02:00'],
            ['2018-12-31T23:12:59+02:00', '2018-12-31T23:12:59+02:00'],
            ['2018-12-31T23:12:59+0200', '2018-12-31T23:12:59+02:00'],
            ['2018-12-31T23:12', '2018-12-31T23:12:00+00:00'],
            ['2018-12', '2018-12-01T00:00:00+00:00'],
        ];
    }
}
