<?php

namespace Meringue\ISO8601DateTime;

use Exception;
use Meringue\ISO8601DateTime;

class FromISO8601 extends ISO8601DateTime
{
    private $s;

    public function __construct($s)
    {
        if (
            !preg_match(
                '/^([\+-]?\d{4}(?!\d{2}\b))((-?)((0[1-9]|1[0-2])(\3([12]\d|0[1-9]|3[01]))?|W([0-4]\d|5[0-2])(-?[1-7])?|(00[1-9]|0[1-9]\d|[12]\d{2}|3([0-5]\d|6[1-6])))([T\s]((([01]\d|2[0-3])((:?)[0-5]\d)?|24\:?00)([\.,]\d+(?!:))?)?(\17[0-5]\d([\.,]\d+)?)?([zZ]|([\+-])([01]\d|2[0-3]):?([0-5]\d)?)?)?)?$/',
                $s
            )
        ) {
            throw new Exception(sprintf('Wrong format of DateTime. The "%s" was passed.', $s));
        }

        $this->s = $s;
    }

    public function value(): string
    {
        return $this->s;
    }
}