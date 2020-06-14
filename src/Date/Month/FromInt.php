<?php

declare(strict_types=1);

namespace Meringue\Date\Month;

use Exception;
use Meringue\Date\Month;

class FromInt extends Month
{
    private $m;

    public function __construct(int $m)
    {
        if ($m < 1 || $m > 12) {
            throw new Exception('Month can not be less then one or greater then 12');
        }

        $this->m = $m;
    }

    public function value(): int
    {
        return $this->m;
    }
}