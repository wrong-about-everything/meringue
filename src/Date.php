<?php

declare(strict_types=1);

namespace Meringue;

use Meringue\ISO8601DateTime\FromISO8601;

abstract class Date
{
    /**
     * Date in ISO8601
     */
    abstract public function value(): string;

    public function equals(Date $date): bool
    {
        return $this->value() === $date->value();
    }

    public function greaterThan(Date $date)
    {
        return
            (new FromISO8601($this->value()))
                ->laterThan(
                    new FromISO8601($date->value())
                );
    }

    public function lessThan(Date $date)
    {
        return !$this->equals($date) && !$this->greaterThan($date);
    }
}
