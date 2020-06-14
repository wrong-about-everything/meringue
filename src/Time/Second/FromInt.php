<?php

declare(strict_types=1);

namespace Meringue\Time\Second;

use Exception;
use Meringue\Time\Second;

class FromInt extends Second
{
    private $s;

    public function __construct(int $s)
    {
        if ($s < 0 || $s > 59) {
            throw new Exception('Second can not be less then zero and greater then 59');
        }

        $this->s = $s;
    }

    public function value(): int
    {
        return $this->s;
    }
}