<?php

declare(strict_types=1);

namespace Meringue\Time\Second;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;
use Meringue\Time\Second;

class FromISO8601DateTime extends Second
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): int
    {
        return (int) (new PHPDateTime($this->dt->value()))->format('s');
    }
}