<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Exception;
use Meringue\FormattedDateTime\Date;
use Meringue\ISO8601DateTime;
use DateTimeImmutable;

// @todo: pass Time instead of three separate parameters; consider passing a Timezone (not necessary: FixedDateTimeInTimeZone is enough.)
class GivenDayDateTime extends ISO8601DateTime
{
    private $givenDay;
    private $hours;
    private $minutes;
    private $seconds;

    public function __construct(ISO8601DateTime $givenDay, int $hours, int $minutes, int $seconds)
    {
        if ($hours < 0 || $hours > 23) {
            throw new Exception('Invalid hours given: ' . $hours);
        }
        if ($minutes < 0 || $minutes > 59) {
            throw new Exception('Invalid minutes given: ' . $minutes);
        }
        if ($seconds < 0 || $seconds > 59) {
            throw new Exception('Invalid seconds given: ' . $seconds);
        }

        $this->givenDay = $givenDay;
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    public function value(): string
    {
        return
            (new FromPhpDateTime(
                new DateTimeImmutable(
                    (new Date($this->givenDay))->value() . sprintf('T%02d:%02d:%02d', $this->hours, $this->minutes, $this->seconds),
                    (new DateTimeImmutable($this->givenDay->value()))->getTimezone()
                )
            ))
                ->value()
            ;
    }
}
