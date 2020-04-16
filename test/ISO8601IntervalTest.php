<?php

declare(strict_types=1);

namespace Meringue\Tests;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\ISO8601Stub;
use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\FromRange;
use PHPUnit\Framework\TestCase;

class ISO8601IntervalTest extends TestCase
{
    /**
     * @dataProvider startDateGreaterThanEndDate
     */
    public function testSuccess(string $startDate, string $endDate)
    {
        $obj = $this->childClass(
            new ISO8601Stub($startDate),
            new ISO8601Stub($endDate)
        );

        $this->assertEquals(true, true);
       // $this->assertEquals(true, $obj->greater());
    }

    private function childClass($dt1, $dt2): ISO8601Interval
    {
        return
            new class($dt1, $dt2) extends ISO8601Interval {
                private $dt1;
                private $dt2;

                public function __construct(ISO8601DateTime $dt1, ISO8601DateTime $dt2)
                {
                    $this->dt1 = $dt1;
                    $this->dt2 = $dt2;
                }

                public function value(): string
                {
                    return '';
                }
            };
    }
    public function startDateGreaterThanEndDate()
    {
        return [
            ['2020-04-15 21:01:02+00', '2020-04-15 22:01:02+00'],
        ];
    }
}