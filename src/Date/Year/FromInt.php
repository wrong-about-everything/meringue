<?php

declare(strict_types=1);

namespace Meringue\Date\Year;

use Meringue\Date\Year;

class FromInt extends Year
{
    private $y;

    public function __construct(int $y)
    {
        $this->y = $y;
    }

    public function value(): int
    {
        return $this->y;
    }
}