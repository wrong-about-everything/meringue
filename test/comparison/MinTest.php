<?php

namespace test\comparison;

use src\comparison\Min;
use src\ISO8601DateTime\FromISO8601;
use src\ISO8601Interval\FromISO8601 as ISO8601Interval;
use src\timeline\Future;
use src\timeline\Now;
use PHPUnit\Framework\TestCase;
use \Exception;

class MinTest extends TestCase
{
    public function testWithTwoArgs()
    {
        $now = new Now();

        $this->assertTrue(
            (new Min(
                $now,
                new Future(
                    new Now(),
                    new ISO8601Interval('PT1S')
                )
            ))
                ->equalsTo($now)
        );
    }

    public function testWithMultipleArgs()
    {
        $min =
            new Min(
                new FromISO8601('2016-07-12T14:29:17+00:00'),
                new FromISO8601('2015-07-12T14:29:17+00:00'),
                new FromISO8601('2014-11-21T06:04:31+00:00'),
                new FromISO8601('2015-12-21T06:04:31+00:00'),
                new FromISO8601('2016-01-18T06:04:31+00:00'),
                new FromISO8601('2017-09-01T06:04:31+00:00'),
                new FromISO8601('2018-08-17T06:04:31+00:00')
            )
        ;

        $this->assertTrue($min->equalsTo(new FromISO8601('2014-11-21T06:04:31+00:00')));
    }

    public function testWithInvalidArgs()
    {
        try {
            new Min(
                '2016-07-12T14:29:17+00:00',
                '2015-07-12T14:29:17+00:00',
                '2014-11-21T06:04:31+00:00',
                '2015-12-21T06:04:31+00:00',
                '2016-01-18T06:04:31+00:00',
                '2017-09-01T06:04:31+00:00',
                '2018-08-17T06:04:31+00:00'
            );
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Min object can not be created with non-ISO8601DateTime arguments');
    }

    public function testWithLessThanTwoArgs()
    {
        try {
            new Min('2016-07-12T14:29:17+00:00');
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Min object can not be created with less than two arguments');
    }
}