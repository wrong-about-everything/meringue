<?php

namespace src\ISO8601Interval;

use Exception;
use src\ISO8601Interval;

class FromISO8601 implements ISO8601Interval
{
    private $i;

    public function __construct($i)
    {
        $this->i = $i;
    }

    public function value()
    {
        if (
            !preg_match(
                '/P((([0-9]*\.?[0-9]*)Y)?(([0-9]*\.?[0-9]*)M)?(([0-9]*\.?[0-9]*)W)?(([0-9]*\.?[0-9]*)D)?)?(T(([0-9]*\.?[0-9]*)H)?(([0-9]*\.?[0-9]*)M)?(([0-9]*\.?[0-9]*)S)?)?/',
                $this->i
            )
        ) {
            throw new Exception();
        }

        return $this->i;
    }
}