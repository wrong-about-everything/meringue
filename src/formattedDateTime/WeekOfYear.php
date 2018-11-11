<?php

namespace Meringue\formattedDateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class WeekOfYear
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    /**
     * ISO-8601 used.
     * @return string
     */
    public function value()
    {
        return strftime('%V', (new ToSeconds($this->dt))->value());
    }
}