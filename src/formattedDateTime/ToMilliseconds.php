<?php

namespace src\formattedDateTime;

use DateTimeImmutable as PHPDateTime;
use src\FormattedDateTime;
use src\ISO8601DateTime;

class ToMilliseconds implements FormattedDateTime
{
    private $s;

    public function __construct(ISO8601DateTime $s)
    {
        $this->s = $s;
    }

    public function value()
    {
        return (new PHPDateTime($this->s->value()))->format('U');
    }
}