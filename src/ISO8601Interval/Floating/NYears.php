<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use Exception;
use Meringue\ISO8601Interval\FloatingInterval;

class NYears implements FloatingInterval
{
    private $years;

    public function __construct(int $years)
    {
        $this->years = $years;
    }

    public function value(): string
    {
        return sprintf('P%dY', $this->years);
    }
}