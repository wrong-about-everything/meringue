<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\CustomFormatted;
use Meringue\ISO8601DateTime\FromISO8601;

class CustomFormattedTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            'Monday 3rd RGMT+043020171499075859 rdMonJuly1414JK0:16200XCV4561Jul<23456789!@#$%^&*()_+2017of July 2017 02:27:39 PM',
            (new CustomFormatted(
                new FromISO8601('2017-07-03T14:27:39+04:30'),
                'l jS RTYU SDFGHJKL:ZXCVBNM<23456789!@#$%^&*()_+o\\of F Y h:i:s A'
            ))
                ->value()
        );
    }
}