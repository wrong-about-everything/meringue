<?php

declare(strict_types=1);

namespace Meringue\Date;

use Meringue\ISO8601DateTime;

abstract class Week
{
    /**
     * @return ISO8601DateTime This week's Monday in ISO8601.
     */
    abstract public function value(): string;

    public function equals(Week $week): bool
    {
        return $this->value() === $week->value();
    }

    public function greaterThan(Week $week): bool
    {
        return $this->value() > $week->value();
    }

    public function lessThan(Week $week): bool
    {
        return $this->value() < $week->value();
    }
}