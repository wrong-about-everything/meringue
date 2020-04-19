<?php

namespace Meringue\ISO8601DateTime;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class FromTimestamp extends ISO8601DateTime
{
    private $ms;

    public function __construct(int $ms)
    {
        $this->ms = $ms;
    }

    public function value(): string
    {
        return (new FromPhpDateTime(PHPDateTime::createFromFormat('U', $this->ms)))->value();
    }
}
