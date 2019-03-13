<?php

declare(strict_types=1);

namespace Meringue\Tests\TimeTest;

use Meringue\Time\DefaultTime;
use PHPUnit\Framework\TestCase;
use Throwable;

class DefaultTimeTest extends TestCase
{
    /**
     * @dataProvider invalidTime
     */
    public function testInvalidTime($hours, $minutes, $seconds)
    {
        try {
            new DefaultTime($hours, $minutes, $seconds);
        } catch (Throwable $e) {
            return $this->assertTrue(true);
        }

        $this->fail('Exception should have been thrown');
    }

    public function invalidTime()
    {
        return [
            [-1, 23, 10],
            [25, 23, 10],
            [17, -3, 10],
            [17, 60, 10],
            [17, 5, -1],
            [17, 5, 60],
            ['17', 5, 59],
            [17, '5', 59],
            [17, 5, '59'],
        ];
    }

    public function testSuccess()
    {
        $this->assertEquals(
            '01:15:27',
            (new DefaultTime(1, 15, 27))
                ->value()
        );
    }
}