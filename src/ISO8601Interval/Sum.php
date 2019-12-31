<?php

namespace Meringue\ISO8601Interval;

use Exception;
use Meringue\ISO8601Interval;
use Meringue\Timeline\Point\Future;
use Meringue\Timeline\Point\Now;

class Sum implements ISO8601Interval
{
    private $i1;
    private $i2;

    public function __construct(ISO8601Interval $i1, ISO8601Interval $i2)
    {
        $this->i1 = $i1;
        $this->i2 = $i2;
    }

    public function value(): string
    {
        $now = new Now();
        return (new FromRange($now, new Future(new Future($now, $this->i1), $this->i2)))->value();
    }
}
