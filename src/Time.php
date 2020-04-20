<?php

declare(strict_types=1);

namespace Meringue;

use Meringue\FormattedDateTime\Date;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\Timeline\Point\Now;

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

    // @todo Rename into laterThan
    // @todo Add earlierThan
    public function greaterThan(Time $time)
    {
        $currentDate = new Date(new Now());

        return
            (new FromISO8601(
                $currentDate->value() . ' '. $this->value()
            ))
                ->laterThan(
                    new FromISO8601(
                        $currentDate->value() . ' '. $time->value()
                    )
                )
            ;

    }
}
