<?php

namespace src\formattedDateTime;

use DateTimeImmutable as PHPDateTime;
use src\ISO8601DateTime;

class ToISO8601
{
    private $s;

    public function __construct(ISO8601DateTime $s)
    {
        $this->s = $s;
    }

    public function value(): string
    {
        return $this->s->value();
    }
}