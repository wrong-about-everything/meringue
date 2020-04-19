<?php

namespace Meringue\ISO8601DateTime;

use DateTime;
use Meringue\ISO8601DateTime;

class ISO8601Stub extends ISO8601DateTime
{
    private $datetime;

    // @todo Remove
    public function __construct(string $datetime)
    {
        $this->datetime =
            (new FromPhpDateTime(
                new DateTime($datetime)
            ))
                ->value();
    }

    public function value(): string
    {
        return $this->datetime;
    }
}