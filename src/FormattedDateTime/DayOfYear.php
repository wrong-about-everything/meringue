<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;

class DayOfYear
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): string
    {
        return strftime('%j', (int) (new ToSeconds($this->dt))->value());
    }
}