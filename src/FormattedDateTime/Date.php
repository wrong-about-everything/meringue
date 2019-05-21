<?php

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class Date
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value()
    {
        return (new PHPDateTime($this->dt->value()))->format('Y-m-d');
    }

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return
            $this->value()
                ==
            (new PHPDateTime($dateTime->value()))->format('Y-m-d');
    }
}