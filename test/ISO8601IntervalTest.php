<?php

declare(strict_types=1);

namespace Meringue\Tests;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\ISO8601Stub;
use Meringue\ISO8601Interval;
use PHPUnit\Framework\TestCase;

class ISO8601IntervalTest extends TestCase
{
    /**
     * @dataProvider acceptedAtAndNowLess24Hours
     */
    public function testSuccess(string $accepted_at, string $now)
    {
        $obj = $this->childClass(
            new ISO8601Stub($accepted_at),
            new ISO8601Stub($now)
        );

        $this->assertEquals(true, $obj->greater());
    }

    /**
     * @dataProvider acceptedAtAndNowPast
     */
    public function testPast(string $accepted_at, string $now)
    {
        $obj = $this->childClass(
            new ISO8601Stub($accepted_at),
            new ISO8601Stub($now)
        );

        $this->assertEquals(false, $obj->greater());
    }

    /**
     * @dataProvider acceptedAtAndNowFuture
     */
    public function testFuture(string $accepted_at, string $now)
    {
        $obj = $this->childClass(
            new ISO8601Stub($accepted_at),
            new ISO8601Stub($now)
        );

        $this->assertEquals(false, $obj->greater());
    }

    private function childClass(ISO8601DateTime $dt1, ISO8601DateTime $dt2): ISO8601Interval
    {
        return
            new class($dt1, $dt2) extends ISO8601Interval {
                protected $dt1;
                protected $dt2;

                public function __construct(ISO8601DateTime $dt1, ISO8601DateTime $dt2)
                {
                    $this->dt1 = $dt1;
                    $this->dt2 = $dt2;
                }

                public function value(): string
                {
                    return 'Some text';
                }
            };
    }

    public function acceptedAtAndNowLess24Hours()
    {
        return [
            ['2020-04-15 21:01:02+00', '2020-04-15 22:01:02+00'],
        ];
    }

    public function acceptedAtAndNowPast()
    {
        return [
            ['2020-04-14 21:01:02+00', '2020-04-15 22:01:02+00'],
        ];
    }

    public function acceptedAtAndNowFuture()
    {
        return [
            ['2020-04-16 21:01:02+00', '2020-04-15 22:01:02+00'],
        ];
    }
}