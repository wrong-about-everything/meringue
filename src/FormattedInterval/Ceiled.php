<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedInterval\Minutes\ToFloat;
use Meringue\WithFixedStartDateTime;

class Ceiled
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return (int) ceil((float) (new ToFloat($this->interval))->value());
    }
}