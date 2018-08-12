<?php

namespace test\comparison;

use src\comparison\Max;
use src\ISO8601DateTime\FromISO8601;
use src\ISO8601Interval\FromISO8601 as ISO8601Interval;
use src\timeline\Now;
use src\timeline\Past;
use PHPUnit\Framework\TestCase;
use \Exception;

class MaxTest extends TestCase
{
    public function testWithTwoArgs()
    {
        $this->assertTrue(
            (new Max(
                new Now(),
                new Past(
                    new Now(),
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
        } catch (Exception $e) {
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