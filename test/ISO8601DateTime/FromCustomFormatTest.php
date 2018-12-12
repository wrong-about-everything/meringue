<?php

namespace Meringue\Tests\ISO8601DateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Year;
use Meringue\ISO8601DateTime\FromCustomFormat;

class FromCustomFormatTest extends TestCase
{
    public function test()
    {
        $this->assertTrue(
            Year::fromIso8601DateTime(
                new FromCustomFormat('Y', '2018')
            )
                ->equalsTo(
                    Year::fromInt(2018)
                )
        );
    }
}