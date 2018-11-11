<?php

namespace Meringue\ISO8601DateTime;

use DateTimeImmutable as PHPDateTime;
use Exception;
use Meringue\ISO8601DateTime;

class FromMilliseconds implements ISO8601DateTime
{
    private $ms;

    public function __construct(int $ms)
    {
        $this->ms = $ms;
    }

    public function value(): string
    {
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