<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime\TimeZone;

use Meringue\ISO8601DateTime\TimeZone\FromString;
use PHPUnit\Framework\TestCase;
use Throwable;

class FromStringTest extends TestCase
{
    /** @dataProvider timezones */
    public function testSuccessful(string $timezone)
    {
        $result = (new FromString($timezone))->value();
        $this->assertEquals($timezone, $result);
    }

    public function timezones()
    {
        return [
            ['Africa/Addis_Ababa'],
            ['Atlantic/Reykjavik'],
            ['Europe/Moscow'],
        ];
    }

    public function testNonExistentTimeZone()
    {
        $timezone = 'non existent';
        try {
            (new FromString($timezone))->value();
            $this->fail('Exception expected');
        } catch (Throwable $exception) {
            $this->assertEquals("Timezone {{{$timezone}}} does not exists", $exception->getMessage());
        }
    }
}
