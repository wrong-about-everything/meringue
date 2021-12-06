<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime\TimeZone;

use DateTime;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\TimeZone;

class FromISO8601DateTime implements TimeZone
{
    private $dateTime;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function value(): string
    {
        return (new DateTime($this->dateTime->value()))->format('P');
    }
}
