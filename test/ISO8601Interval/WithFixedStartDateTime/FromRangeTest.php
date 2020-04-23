<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601Interval\WithFixedStartDateTime;

use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\Floating\FromISO8601 as IntervalFromISO8601String;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\Timeline\Point\Future;
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
            $interval,
            (new FromRange(
                new FromISO8601($startDate),
                new FromISO8601($endDate)
            ))
                ->value()
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
                new FromISO8601($startDate),
                new FromISO8601($endDate)
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

    public function testRange()
    {
        $interval =
            new FromRange(
                new FromISO8601('2020-04-20T21:01:19+03'),
                new Future(
                    new FromISO8601('2020-04-20T21:01:19+03'),
                    new IntervalFromISO8601String('P1Y65DT119S')
                )
            );

        $this->assertEquals(
            'P1Y2M4DT0H1M59S',
            $interval->value()
        );
        $this->assertEquals(
            '2020-04-20T21:01:19+03:00',
            $interval->starts()->value()
        );
        $this->assertEquals(
            '2021-06-24T21:03:18+03:00',
            $interval->ends()->value()
        );
    }
}
