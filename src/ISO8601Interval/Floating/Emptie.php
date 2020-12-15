<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Meringue\ISO8601Interval\FloatingInterval;

class Emptie implements FloatingInterval
{
    public function value(): string
    {
        return (new NSeconds(0))->value();
    }
}