<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime\TimeZone;

use Meringue\ISO8601DateTime\TimeZone\FromString;
use PHPUnit\Framework\TestCase;
use Throwable;

class FromStringTest extends TestCase
{
    /**
     * @dataProvider validTimeZones
     */
    public function testValidTimeZones(string $timezone)
    {
        $result = (new FromString($timezone))->value();
        $this->assertEquals($timezone, $result);
    }

    public function validTimeZones()
    {
        return [
            ['Z'],
            ['+07'],
            ['+0730'],
            ['+0000'],
            ['+0700'],
            ['+00:00'],
            ['+03:00'],
            ['-07:40'],
            ['+11:55'],
        ];
    }

    /**
     * @dataProvider invalidTimeZones
     */
    public function testInvalidTimeZones(string $timezone)
    {
        try {
            (new FromString($timezone))->value();
            $this->fail('Exception expected');
        } catch (Throwable $exception) {
            $this->assertEquals("Offset {$timezone} is invalid", $exception->getMessage());
        }
    }

    public function invalidTimeZones()
    {
        return [
            ['vasya'],
            ['a'],
            ['=00:00'],
            ['+20:00'],
            ['+10:60'],
            ['+10;50'],
            ['+10:591'],
        ];
    }
}
