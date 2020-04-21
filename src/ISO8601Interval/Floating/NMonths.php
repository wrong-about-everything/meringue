<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class NMonths implements FloatingInterval
{
    private $months;

    public function __construct(int $months)
    {
        $this->months = $months;
    }

    public function value(): string
    {
        return sprintf('P%dM', $this->months);
    }
}