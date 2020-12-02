<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\Date\FromISO8601DateTime;
use Meringue\ISO8601DateTime;
use DateTimeImmutable;
use Meringue\Time\Hour\FromInt as Hour;
use Meringue\Time\Minute\FromInt as Minute;
use Meringue\Time\Second\FromInt as Second;

// @todo: pass Time instead of three separate parameters; consider passing a Timezone (not necessary: FixedDateTimeInTimeZone is enough.)
class GivenDayDateTime extends ISO8601DateTime
{
    private $givenDaysDateTime;
    private $hours;
    private $minutes;
    private $seconds;

    public function __construct(ISO8601DateTime $givenDaysDateTime, int $hours, int $minutes, int $seconds)
    {
        $this->givenDaysDateTime = $givenDaysDateTime;
        $this->hours = new Hour($hours);
        $this->minutes = new Minute($minutes);
        $this->seconds = new Second($seconds);
    }

    public function value(): string
    {
        return
            (new FromPhpDateTime(
                new DateTimeImmutable(
                    (new FromISO8601DateTime($this->givenDaysDateTime))->value() . sprintf('T%02d:%02d:%02d', $this->hours->value(), $this->minutes->value(), $this->seconds->value()),
                    (new DateTimeImmutable($this->givenDaysDateTime->value()))->getTimezone()
                )
            ))
                ->value()
            ;
    }
}
