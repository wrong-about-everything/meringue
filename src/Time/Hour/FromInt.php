<?php

declare(strict_types=1);

namespace Meringue\Time\Hour;

use Exception;
use Meringue\Time\Hour;

class FromInt extends Hour
{
    private $h;

    public function __construct(int $h)
    {
        if ($h < 0 || $h > 23) {
            throw new Exception('Hour can not be less then zero and greater then 23');
        }

        $this->h = $h;
    }

    public function value(): int
    {
        return $this->h;
    }
}