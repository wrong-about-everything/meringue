<?php

declare(strict_types=1);

namespace Meringue\Date\Day;

use Exception;
use Meringue\Date\Day;

class FromInt extends Day
{
    private $d;

    public function __construct(int $d)
    {
        if ($d < 1 || $d > 31) {
            throw new Exception('Day can not be less then 1 or greater then 31');
        }

        $this->d = $d;
    }

    public function value(): int
    {
        return $this->d;
    }
}