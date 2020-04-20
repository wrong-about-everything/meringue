<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\DayOfWeekInUTC;
use Meringue\FormattedDateTime\WithCallback;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromISO8601;

class WithCallbackTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            'Сегодня четвержочек',
            (new WithCallback(
                new FromISO8601('2018-08-16T14:27:39+04:30'),
                function (ISO8601DateTime $dateTime) {
                    if ((new DayOfWeekInUTC($dateTime))->numeric() == 4) {
                        return 'Сегодня четвержочек';
                    }

                    return 'Сегодня не четвержочек';
                }
            ))
                ->value()
        );
    }
}
