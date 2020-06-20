<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable;

class TheFirstDayOfNMonthsLater extends ISO8601DateTime
{
    private $givenDay;
    private $months;

    public function __construct(ISO8601DateTime $givenDay, int $months)
    {
        $this->givenDay = $givenDay;
        $this->months = $months;
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
                        ->modify(sprintf('first day of +%d month', $this->months))
                )
            ))
                ->value();
    }
}
