<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class NDays implements FloatingInterval
{
    private $days;

    public function __construct(int $days)
    {
        $this->days = $days;
    }

    public function value(): string
    {
        return sprintf('P%dD', $this->days);
    }
}