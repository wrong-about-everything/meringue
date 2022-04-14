<?php

declare(strict_types=1);

namespace Meringue\Tests\WeekDay;

use Exception;
use Meringue\WeekDay\ById;
use PHPUnit\Framework\TestCase;

class ByIdTest extends TestCase
{
    /**
     * @dataProvider validWeekDayIds
     */
    public function testValidWeekDayId(int $weekDayId)
    {
        $this->assertEquals(
            $weekDayId,
            (new ById($weekDayId))->value()
        );
    }

    /**
     * @dataProvider invalidWeekDayIds
     */
    public function testInvalidWeekDayId(int $weekDayId)
    {
        try {
            new ById($weekDayId);
        } catch (Exception $e) {
            return $this->assertTrue(true);
        }

        $this->assertFalse('Exception should have been thrown');
    }

    public function validWeekDayIds()
    {
        return [
            [1],
            [2],
            [3],
            [4],
            [5],
            [6],
            [7],
        ];
    }

    public function invalidWeekDayIds()
    {
        return [
            [0],
            [8],
            [12],
            [17],
        ];
    }
}
