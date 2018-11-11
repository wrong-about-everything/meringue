<?php

namespace Meringue\ISO8601DateTime;

use Exception;
use Meringue\ISO8601DateTime;

class ISO8601Stub implements ISO8601DateTime
{
    private $datetime;

    public function __construct($datetime)
    {
        $this->datetime = $datetime;
    }

    public function value(): string
    {
        return $this->datetime;
    }

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }
}