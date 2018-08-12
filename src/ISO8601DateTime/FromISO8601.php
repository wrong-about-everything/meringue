<?php

namespace src\ISO8601DateTime;

use Exception;
use src\ISO8601DateTime;

class FromISO8601 implements ISO8601DateTime
{
    private $s;

    public function __construct($s)
    {
        $this->s = $s;
    }

    public function value(): string
    {
        if (
            !preg_match(
                '/^(?:[1-9]\d{3}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1\d|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[1-9]\d(?:0[48]|[2468][048]|[13579][26])|(?:[2468][048]|[13579][26])00)-02-29)T(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d(?:Z|[+-][01]\d:[0-5]\d)$/',
                $this->s
            )
        ) {
            throw new Exception('Input date is not in ISO8601 format.');
        }

        return $this->s;
    }

    public function equalsTo(ISO8601DateTime $dateTime): bool
    {
        return new PHPDateTime($this->value()) == new PHPDateTime($dateTime->value());
    }
}