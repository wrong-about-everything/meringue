<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class NSeconds implements FloatingInterval
{
    private $seconds;

    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    public function value(): string
    {
        return sprintf('PT%dS', $this->seconds);
    }
}