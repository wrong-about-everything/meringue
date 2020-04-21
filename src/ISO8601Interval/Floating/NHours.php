<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class NHours implements FloatingInterval
{
    private $hours;

    public function __construct(int $hours)
    {
        $this->hours = $hours;
    }

    public function value(): string
    {
        return sprintf('PT%dH', $this->hours);
    }
}