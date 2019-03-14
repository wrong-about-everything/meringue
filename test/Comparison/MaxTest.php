<?php

namespace Meringue\Tests\Comparison;

use Meringue\Comparison\Max;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\FromISO8601 as ISO8601Interval;
use Meringue\Timeline\Now;
use Meringue\Timeline\Past;
use PHPUnit\Framework\TestCase;
use \Exception;
use Throwable;

class MaxTest extends TestCase
{
    public function testWithTwoArgs()
    {
        $now = new Now();
        $this->assertTrue(
            (new Max(
                $now,
                new Past(
                    $now,
                    new ISO8601Interval('PT1S')
                )
            ))
                ->equalsTo(new Now())
        );
    }

    public function testWithMultipleArgs()
    {
        $max =
            new Max(
                new FromISO8601('2016-07-12T14:29:17+00:00'),
                new FromISO8601('2015-07-12T14:29:17+00:00'),
                new FromISO8601('2014-11-21T06:04:31+00:00'),
                new FromISO8601('2015-12-21T06:04:31+00:00'),
                new FromISO8601('2016-01-18T06:04:31+00:00'),
                new FromISO8601('2018-08-17T06:04:31+00:00'),
                new FromISO8601('2017-09-01T06:04:31+00:00')
            )
        ;

        $this->assertTrue($max->equalsTo(new FromISO8601('2018-08-17T06:04:31+00:00')));
    }

    public function testWithInvalidArgs()
    {
        try {
            new Max(
                '2016-07-12T14:29:17+00:00',
                '2015-07-12T14:29:17+00:00',
                '2014-11-21T06:04:31+00:00',
                '2015-12-21T06:04:31+00:00',
                '2016-01-18T06:04:31+00:00',
                '2017-09-01T06:04:31+00:00',
                '2018-08-17T06:04:31+00:00'
            );
        } catch (Throwable $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Max object can not be created with non-ISO8601DateTime arguments');
    }

    public function testWithLessThanTwoArgs()
    {
        try {
            new Max();
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Max object can not be created with less than two arguments');
    }
}