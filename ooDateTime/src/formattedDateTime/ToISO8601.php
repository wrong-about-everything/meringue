<?php

namespace ooDateTime\src\formattedDateTime;

use DateTimeImmutable as PHPDateTime;
use ooDateTime\src\FormattedDateTime;
use ooDateTime\src\ISO8601DateTime;

class ToISO8601 implements FormattedDateTime
{
    private $s;

    public function __construct(ISO8601DateTime $s)
    {
        $this->s = $s;
    }

    public function value()
    {
        return (new PHPDateTime($this->s->value()))->format('c');
    }
}