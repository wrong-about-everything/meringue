<?php

namespace src\ISO8601DateTime;

use src\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class FromCustomFormat implements ISO8601DateTime
{
    private $format;
    private $dateTime;

    public function __construct(string $format, string $dateTime)
    {
        $this->format = $format;
        $this->dateTime = $dateTime;
    }

    public function value(): string
    {
        return PHPDateTime::createFromFormat($this->format, $this->dateTime)->format('c');
    }

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }
}