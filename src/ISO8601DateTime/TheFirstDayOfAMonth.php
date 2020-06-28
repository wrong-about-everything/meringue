<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable;

class TheFirstDayOfAMonth extends ISO8601DateTime
{
    private $givenDay;

    public function __construct(ISO8601DateTime $givenDay)
    {
        $this->givenDay = $givenDay;
    }

    public function value(): string
    {
        return
            (new TheBeginningOfADay(
                new FromPhpDateTime(
                    (new DateTimeImmutable(
                        $this->givenDay->value(),
                        (new DateTimeImmutable($this->givenDay->value()))->getTimezone()
                    ))
                        ->modify('first day of this month')
                )
            ))
                ->value();
    }
}
