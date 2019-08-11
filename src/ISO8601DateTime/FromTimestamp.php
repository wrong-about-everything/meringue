<?php

namespace Meringue\ISO8601DateTime;

use DateTimeImmutable as PHPDateTime;
use Meringue\FormattedDateTime\CanonicalISO8601DateTime;
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
        return (new CanonicalISO8601DateTime(PHPDateTime::createFromFormat('U', $this->ms)))->value();
    }
}
