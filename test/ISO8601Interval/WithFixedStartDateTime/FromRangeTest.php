<?php

namespace Meringue\Tests\ISO8601Interval\WithFixedStartDateTime;

use Meringue\ISO8601DateTime\ISO8601Stub;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use PHPUnit\Framework\TestCase;
use \Exception;

class FromRangeTest extends TestCase
{
    /**
     * @dataProvider endDateGreaterThanStartDate
     */
    public function testCorrectFormat(string $startDate, string $endDate, string $interval)
    {
        $this->assertEquals(
            (new FromRange(
                new ISO8601Stub($startDate),
                new ISO8601Stub($endDate)
            ))
                ->value(),
            $interval
        );
    }

    public function endDateGreaterThanStartDate()
    {
        return [
            ['2017-07-03T14:27:39+00:00', '2017-08-28T14:29:47+00:00', 'P0Y1M25DT0H2M8S'],
            ['2018-12-12T14:11:06+00:00', '2018-12-12 17:29:24+03', 'P0Y0M0DT0H18M18S']
        ];
    }

    /**
     * @dataProvider startDateGreaterThanEndDate
     */
    public function testWrongFormat(string $startDate, string $endDate)
    {
        try {
            new FromRange(
                new ISO8601Stub($startDate),
                new ISO8601Stub($endDate)
            );
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('End date can not be less than start date.');
    }

    public function startDateGreaterThanEndDate()
    {
        return [
            ['2017-09-03T14:27:39+00:00', '2017-08-28T14:29:47+00:00'],
        ];
    }
}
