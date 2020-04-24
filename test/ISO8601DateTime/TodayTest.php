<?php

declare(strict_types=1);

namespace Meringue\Tests\ISO8601DateTime;

use DateTimeImmutable;
use Meringue\ISO8601DateTime\FromCustomFormat;
use Meringue\ISO8601DateTime\Today;
use PHPUnit\Framework\TestCase;

class TodayTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            (new FromCustomFormat(
                'd.m.Y H:i:s',
                (new DateTimeImmutable('now'))
                    ->format('d.m.Y 00:00:00')
            ))
                ->value(),
            (new Today())->value()
        );
    }
}
