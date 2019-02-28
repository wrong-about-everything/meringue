<?php

namespace Meringue\Tests\ISO8601DateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use PHPUnit\Framework\TestCase;
use \Exception;

class FromISO8601Test extends TestCase
{
    /**
     * @dataProvider correctlyFormattedDateTimes
     */
    public function testCorrectFormat(string $dateTime)
    {
        $this->assertEquals(
            (new FromISO8601($dateTime))
                ->value(),
            $dateTime
        );
    }

    public function correctlyFormattedDateTimes()
    {
        return [
            ['2014-11-21T06:04:31+00:00'],
            ['2014-11-21T06:04:31+04:30'],
            ['2014-11-21 06:04:31+00:00'],
            ['2014-11-21 06:04:31+11:30'],
            ['2014-11-21 06:04:31-11:30'],
            ['2014-11-21 06:04:31+1130'],
            ['2014-11-21 06:04:31-1130'],
            ['2014-11-21 06:04:31+11'],
            ['2014-11-21 06:04:31-11'],
            ['2014-11-21 06:04:31+00'],
            ['2014-11-21 06:04:31Z'],
            ['2014-11-21T06:04:31-11:30'],
            ['2014-11-21T06:04:31+1130'],
            ['2014-11-21T06:04:31-1130'],
            ['2014-11-21T06:04:31+11'],
            ['2014-11-21T06:04:31-11'],
            ['2014-11-21T06:04:31+00'],
            ['2014-11-21T06:04:31Z'],
        ];
    }

    /**
     * @dataProvider erroneouslyFormattedDateTimes
     */
    public function testWrongFormat(string $dateTime)
    {
        try {
            (new FromISO8601($dateTime));
        } catch (Exception $e) {
            $this->assertEquals(sprintf('Wrong format of DateTime. The "%s" was passed.', $dateTime), $e->getMessage());
            return;
        }

        $this->fail('Datetime is not in ISO8601 format.');
    }

    public function erroneouslyFormattedDateTimes()
    {
        return [
            ['2014-11-21T06:04:31+00:s0'],
            ['2015-11-21T 06:04:31+04:30'],
            ['2014-11-21TT06:04:31+04:30'],
            ['201-11-21T06:04:31+04:30'],
            ['2018-11-21T24:04:31+04:30'],
            ['2018-11-21T25:04:31+04:30'],
            ['20181-11-21T12:04:31+04:30'],
            ['2018-13-32T12:04:31+04:30'],
        ];
    }
}
