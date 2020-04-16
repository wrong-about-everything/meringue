<?php

namespace Meringue\ISO8601Interval;

use Exception;
use Meringue\ISO8601Interval;
use Meringue\Timeline\Point\Future;
use Meringue\Timeline\Point\Now;

class Sum extends ISO8601Interval
{
    private $dt1;
    private $dt2;

    public function __construct(ISO8601Interval $i1, ISO8601Interval $i2)
    {
        $this->dt1 = $i1;
        $this->dt2 = $i2;
    }

    public function value(): string
    {
        $now = new Now();
        return (new FromRange($now, new Future(new Future($now, $this->dt1), $this->dt2)))->value();
    }
}
