<?php

namespace Meringue\formattedDateTime;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

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