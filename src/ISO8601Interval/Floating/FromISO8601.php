<?php

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class FromISO8601 implements FloatingInterval
{
    private $i;

    public function __construct(string $i)
    {
        if (
            !preg_match(
                '/P((([0-9]*\.?[0-9]*)Y)?(([0-9]*\.?[0-9]*)M)?(([0-9]*\.?[0-9]*)W)?(([0-9]*\.?[0-9]*)D)?)?(T(([0-9]*\.?[0-9]*)H)?(([0-9]*\.?[0-9]*)M)?(([0-9]*\.?[0-9]*)S)?)?/',
                $i
            )
        ) {
            throw new Exception();
        }

        $this->i = $i;
    }

    public function value(): string
    {

        return $this->i;
    }
}