<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class StartOfTheDay extends ISO8601DateTime
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): string
    {
        return (new PHPDateTime($this->dt->value()))->format('Y-m-d 00:00:00P');
    }
}