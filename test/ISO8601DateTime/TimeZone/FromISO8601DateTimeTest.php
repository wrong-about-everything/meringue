<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime\TimeZone;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\TimeZone\FromISO8601DateTime;
use PHPUnit\Framework\TestCase;

class FromISO8601DateTimeTest extends TestCase
{
    /**
     * @dataProvider dateTimesAndOffsets
     */
    public function testDateTimeHasSpecificOffset(string $dateTime, string $offset)
    {
        $result = (new FromISO8601DateTime(new FromISO8601($dateTime)))->value();
        $this->assertEquals($offset, $result);
    }

    public function dateTimesAndOffsets()
    {
        return [
            ['2020-11-29T22:56:47z', '+00:00'],
            ['2020-11-29T22:56:47+00:00', '+00:00'],
            ['2020-11-29T22:56:47+0000', '+00:00'],
            ['2020-11-29T22:56:47+00', '+00:00'],
            ['2020-11-29T22:56:47+03:00', '+03:00'],
            ['2020-11-29T22:56:47+0300', '+03:00'],
            ['2020-11-29T22:56:47+0340', '+03:40'],
            ['2020-11-29T22:56:47+03', '+03:00'],
            ['2020-11-29T22:56:47-11:40', '-11:40'],
            ['2020-11-29T22:56:47-18:58', '-18:58'],
            ['2020-11-29T22:56:47+1858', '+18:58'],
        ];
    }
}
