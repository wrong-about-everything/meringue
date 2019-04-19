<?php

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Year;
use Meringue\ISO8601DateTime\FromCustomFormat;

class FromCustomFormatTest extends TestCase
{
    /**
     * @dataProvider validDateTimes
     */
    public function testValidDateTimes(string $format, string $dateTime)
    {
        $customFormatDateTime = new FromCustomFormat($format, $dateTime);

        $this->assertTrue($customFormatDateTime->isValid());
        $this->assertEquals(
            $customFormatDateTime->value(),
            (new FromISO8601($dateTime))->value()
        );
    }

    public function validDateTimes()
    {
        return [
            ['Y', '2018'],
            ['Y-m', '2018-12'],
            ['Y-m-d', '2018-12-31'],
            ['Y-m-d\TH', '2018-12-31T23'],
            ['Y-m-d\TH:i', '2018-12-31T23:12'],
            ['Y-m-d\TH:i:s', '2018-12-31T23:12:59'],
            ['Y-m-d\TH:i:sO', '2018-12-31T23:12:59+0200'],
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
