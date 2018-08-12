<?php

namespace src\ISO8601DateTime;

use DateTimeImmutable as PHPDateTime;
use Exception;
use src\ISO8601DateTime;

class FromMilliseconds implements ISO8601DateTime
{
    private $ms;

    public function __construct($ms)
    {
        $this->ms = $ms;
    }

    public function value(): string
    {
        if (!ctype_digit($this->ms)) {
            throw new Exception();
        }

        return PHPDateTime::createFromFormat('U', $this->ms)->format('c');
    }

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return
            new PHPDateTime($this->value())
                ==
            new PHPDateTime($dateTime->value());
    }
}