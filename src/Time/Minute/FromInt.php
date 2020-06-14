<?php

declare(strict_types=1);

namespace Meringue\Time\Minute;

use Exception;
use Meringue\Time\Minute;

class FromInt extends Minute
{
    private $m;

    public function __construct(int $m)
    {
        if ($m < 0 || $m > 59) {
            throw new Exception('Minute can not be less then zero and greater then 59');
        }

        $this->m = $m;
    }

    public function value(): int
    {
        return $this->m;
    }
}