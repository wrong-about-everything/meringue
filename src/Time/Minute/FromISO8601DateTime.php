<?php

declare(strict_types=1);

namespace Meringue\Time\Minute;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;
use Meringue\Time\Minute;

class FromISO8601DateTime extends Minute
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): int
    {
        return (int) (new PHPDateTime($this->dt->value()))->format('i');
    }
}