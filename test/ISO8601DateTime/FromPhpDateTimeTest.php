<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromPhpDateTime;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable as PhpDateTime;

class FromPhpDateTimeTest extends TestCase
{
    /**
     * @dataProvider validIso8601DateTimesWithCanonicalRepresentation
     */
    public function testEquals(string $dateTime, string $canonical)
    {
        $this->assertEquals(
            $canonical,
            (new FromPhpDateTime(
                new PhpDateTime($dateTime)
            ))
                ->value()
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
