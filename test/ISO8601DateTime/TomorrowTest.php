<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601DateTime\Tomorrow;
use PHPUnit\Framework\TestCase;

class TomorrowTest extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(ISO8601DateTime $dateTime, string $expected)
    {
        $this->assertEquals(
            $expected,
            (new Tomorrow($dateTime))->value()
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            [new FromISO8601('2014-12-31'), '2015-01-01T00:00:00+00:00'],
            [new FromISO8601('2020-02-29T23:57:04+07:00'), '2020-03-01T23:57:04+07:00'],
        ];
    }
}
