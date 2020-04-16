<?php

namespace Meringue;

use DateTimeImmutable as PHPDateTime;

abstract class ISO8601Interval
{
    private $dt1;
    private $dt2;

    abstract public function value(): string;

    public function equals()
    {
        return new PHPDateTime($this->dt1->value()) == new PHPDateTime($this->dt2->value());
    }

    public function greater(): bool
    {
        $datetime1 = new PHPDateTime($this->dt1->value());
        $datetime2 = new PHPDateTime($this->dt2->value());
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        if ($datetime1->getTimestamp() < $datetime2->getTimestamp()) {
            if ((int)$days == 0) {
                return true;
            }
        }

        return false;
    }
}
