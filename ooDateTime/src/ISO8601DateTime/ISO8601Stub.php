<?php

namespace ooDateTime\src\ISO8601DateTime;

use Exception;
use ooDateTime\src\ISO8601DateTime;

class ISO8601Stub implements ISO8601DateTime
{
    private $datetime;

    public function __construct($datetime)
    {
        $this->datetime = $datetime;
    }

    public function value()
    {
        return $this->datetime;
    }

    public function equalsTo(ISO8601DateTime $dateTime)
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }
}