<?php

namespace Meringue\formattedDateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;
use \DateTimeInterface;

class AtomFormatted
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value()
    {
        return (new PHPDateTime($this->dt->value()))->format(DateTimeInterface::ATOM);
    }
}