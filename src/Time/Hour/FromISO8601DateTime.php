<?php

declare(strict_types=1);

namespace Meringue\Time\Hour;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;
use Meringue\Time\Hour;

class FromISO8601DateTime extends Hour
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): int
    {
        return (int) (new PHPDateTime($this->dt->value()))->format('H');
    }
}