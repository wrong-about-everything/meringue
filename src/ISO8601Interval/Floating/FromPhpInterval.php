<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use DateInterval;
use Meringue\ISO8601Interval\FloatingInterval;

class FromPhpInterval implements FloatingInterval
{
    private $i;

    public function __construct(DateInterval $i)
    {
        $this->i = new FromISO8601($i->format("P%yY%mM%dDT%hH%iM%sS"));
    }

    public function value(): string
    {
        return $this->i->value();
    }
}