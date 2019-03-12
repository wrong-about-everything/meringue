<?php

namespace Meringue\Tests\ISO8601Interval;

use Meringue\ISO8601DateTime\ISO8601Stub;
use Meringue\ISO8601Interval\FromRange;
use Meringue\ISO8601Interval\NonOverlappingComposite;
use Meringue\WithFixedStartDateTime;
use PHPUnit\Framework\TestCase;
use \Exception;

class NonOverlappingCompositeTest extends TestCase
{
    public function testEmptyInterval()
    {
        try {
            new NonOverlappingComposite();
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Empty interval should not have been created.');
    }

    /**
     * @dataProvider overlappingIntervals
     */
    public function testOverlappingIntervals(WithFixedStartDateTime ... $dateTimeIntervals)
    {
        try {
            new NonOverlappingComposite(... $dateTimeIntervals);
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Intervals can not overlap.');
    }

    public function overlappingIntervals()
    {
        return [
            [
                new FromRange(
                    new ISO8601Stub('01-01-2019 07:49:52'),
                    new ISO8601Stub('01-01-2019 07:49:53')
                ),
                new FromRange(
                    new ISO8601Stub('02-01-2019 11:21:01'),
                    new ISO8601Stub('13-01-2019 23:11:11')
                ),
                new FromRange(
                    new ISO8601Stub('01-01-2019 07:49:52'),
                    new ISO8601Stub('02-01-2019 11:21:01')
                ),
            ],
        ];
    }

    /**
     * @dataProvider notOverlappingIntervals
     */
    public function testNotOverlappingIntervals(array $dateTimeIntervals, WithFixedStartDateTime $overallInterval)
    {
        $composite = new NonOverlappingComposite(... $dateTimeIntervals);

        $this->assertEquals(
            $overallInterval->value(),
            $composite->value()
        );
        $this->assertEquals(
            $overallInterval->starts(),
            $composite->starts()
        );
        $this->assertEquals(
            $overallInterval->ends(),
            $composite->ends()
        );
    }

    public function notOverlappingIntervals()
    {
        return [
            [
                [
                    new FromRange(
                        new ISO8601Stub('01-01-2019 07:49:52'),
                        new ISO8601Stub('01-01-2019 07:49:53')
                    ),
                    new FromRange(
                        new ISO8601Stub('02-01-2019 11:21:01'),
                        new ISO8601Stub('13-01-2019 23:11:11')
                    ),
                    new FromRange(
                        new ISO8601Stub('01-01-2019 07:49:53'),
                        new ISO8601Stub('02-01-2019 11:21:01')
                    ),
                ],
                new FromRange(
                    new ISO8601Stub('01-01-2019 07:49:52'),
                    new ISO8601Stub('13-01-2019 23:11:11')
                )
            ],
        ];
    }
}
