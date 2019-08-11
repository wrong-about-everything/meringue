<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\FormattedDateTime\CanonicalISO8601DateTime;
use Meringue\ISO8601DateTime;
use DateTimeZone;
use DateTimeImmutable as PhpDateTime;

class InTimeZone extends ISO8601DateTime
{
    private $dateTime;
    private $timeZone;

    public function __construct(ISO8601DateTime $dateTime, TimeZone $timeZone)
    {
        $this->dateTime = $dateTime;
        $this->timeZone = $timeZone;
    }

    public function value(): string
    {
        return
            (new CanonicalISO8601DateTime(
                (new PhpDateTime($this->dateTime->value()))
                    ->setTimezone(
                        new DateTimeZone($this->timeZone->value())
                    )
            ))
                ->value();
    }
}
