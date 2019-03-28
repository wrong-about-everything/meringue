<?php

namespace Meringue\ISO8601DateTime;

use Exception;
use Meringue\FormattedDateTime\Date;
use Meringue\FormattedDateTime\ToSeconds;
use Meringue\ISO8601DateTime;

class NextDayDateTime extends ISO8601DateTime
{
    private $givenDay;
    private $hours;
    private $minutes;
    private $seconds;
    private $timezone;

    public function __construct(ISO8601DateTime $givenDay, int $hours, int $minutes, int $seconds, int $timezone)
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
        $this->timezone = $timezone;
    }

    public function value(): string
    {
        return
            (new FromISO8601(
                date('Y-m-d', strtotime(' +1 day', (new ToSeconds($this->givenDay))->value())) .
                sprintf('T%02d:%02d:%02d', $this->hours, $this->minutes, $this->seconds) .
                (
                    $this->timezone >= 0
                        ? sprintf('+%02d:00', $this->timezone)
                        : sprintf('%03d:00', $this->timezone)
                )
            ))
                ->value()
            ;
    }
}