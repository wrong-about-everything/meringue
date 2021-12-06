<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use DateTime;
use Meringue\ISO8601DateTime;
use DateTimeZone;
use DateTimeImmutable as PhpDateTime;

class FixedDateTimeWithSpecifiedTimeZone extends ISO8601DateTime
{
    private $dateTime;
    private $timeZone;

    public function __construct(ISO8601DateTime $dateTime, PhpSpecificTimeZone $timeZone)
    {
        $this->dateTime = $dateTime;
        $this->timeZone = $timeZone;
    }

    public function value(): string
    {
        return
            (new FromPhpDateTime(
                new DateTime(
                    (new PhpDateTime($this->dateTime->value()))->format('Y-m-d H:i:s'),
                    new DateTimeZone($this->timeZone->value())
                )
            ))
                ->value();
    }
}
