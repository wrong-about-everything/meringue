<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class TheEndOfADay extends ISO8601DateTime
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): string
    {
        return
            (new FromISO8601(
                (new PHPDateTime($this->dt->value()))
                    ->format('Y-m-d 23:59:59P')
            ))
                ->value()
        ;
    }
}
