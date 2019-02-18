<?php

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;

class ISO8601Stub extends ISO8601DateTime
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
}