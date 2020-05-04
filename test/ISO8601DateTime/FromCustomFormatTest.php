<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use PHPUnit\Framework\TestCase;
use Meringue\ISO8601DateTime\FromCustomFormat;

class FromCustomFormatTest extends TestCase
{
    /**
     * @dataProvider validDateTimes
     */
    public function testValidDateTimes(string $format, string $dateTime, string $canonical)
    {
        $customFormatDateTime = new FromCustomFormat($format, $dateTime);

        $this->assertTrue($customFormatDateTime->isValid());
        $this->assertEquals(
            $canonical,
            $customFormatDateTime->value()
        );
    }

    public function validDateTimes()
    {
        return [
            ['Y-m-d\TH', '2018-12-31T23', '2018-12-31T23:00:00+00:00'],
            ['Y-m-d\TH:i', '2018-12-31T23:12', '2018-12-31T23:12:00+00:00'],
            ['Y-m-d\TH:i:s', '2018-12-31T23:12:59', '2018-12-31T23:12:59+00:00'],
            ['Y-m-d\TH:i:sO', '2018-12-31T23:12:59+0200', '2018-12-31T23:12:59+02:00'],
            ['mY--d\T\T\!H:i:sO', '122018--31TT!23:12:59+0200', '2018-12-31T23:12:59+02:00'],
        ];
    }

    /**
     * @dataProvider invalidDateTimes
     */
    public function testWrongFormat(string $format, string $dateTime)
    {
        $this->assertFalse(
            (new FromCustomFormat(
                $format,
                $dateTime
            ))
                ->isValid()
        );
    }

    public function invalidDateTimes()
    {
        return [
            ['Y', '999'],
            ['Y-m', '2018-13'],
            ['Y-m-d', '2018-12-32'],
            ['Y-m-dTH', '2018-12-31T23'],
            ['Y-m-d\TH', '2018-12-31T24'],
            ['Y-m-d\TH:i', '2018-12-31T23:60'],
            ['Y-m-d\TH:i:s', '2018-12-31T23:12:60'],
            ['Y-m-d\TH:i:sO', '2018-12-31T23:12:59+1488'],
        ];
    }
}
