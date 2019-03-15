<?php

namespace Meringue\FormattedDateTime;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class ToSeconds
{
    private $s;

    public function __construct(ISO8601DateTime $s)
    {
        $this->s = $s;
    }

    public function value(): string
    {
        $phpDateTime = new PHPDateTime($this->s->value());
        if ((int) $phpDateTime->format('u') != 0) {
            return $phpDateTime->format('U.u');
        }

        return $phpDateTime->format('U');
    }
}