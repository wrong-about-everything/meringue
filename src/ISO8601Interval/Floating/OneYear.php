<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class OneYear implements FloatingInterval
{
    public function value(): string
    {
        return 'P1Y';
    }
}