<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class NMinutes implements FloatingInterval
{
    private $minutes;

    public function __construct(int $minutes)
    {
        $this->minutes = $minutes;
    }

    public function value(): string
    {
        return sprintf('PT%dM', $this->minutes);
    }
}