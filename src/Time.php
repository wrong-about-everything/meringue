<?php

namespace Meringue;

use DateTimeImmutable as PHPDateTime;
use Meringue\FormattedDateTime\Date;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Timeline\Now;

abstract class Time
{
    /**
     * Time in ISO8601
     */
    abstract public function value(): string;

    public function equals(Time $time): bool
    {
        return $this->value() === $time->value();
    }

    public function greaterThan(Time $time)
    {
        $currentDate = new Date(new Now());

        return
            new PHPDateTime(
                (new FromISO8601(
                    $currentDate->value() . ' '. $this->value()
                ))
                    ->value()
            )
                >
            new PHPDateTime(
                (new FromISO8601(
                    $currentDate->value() . ' '. $time->value()
                ))
                    ->value()
            );

    }
}
