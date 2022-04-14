<?php

declare(strict_types=1);

namespace Meringue\WeekDay;

use Exception;
use Meringue\WeekDay;

class ById extends WeekDay
{
    private $id;

    public function __construct(int $id)
    {
        if (!in_array($id, range(1, 7))) {
            throw new Exception('Weekday id must be between 1 and 7');
        }
        $this->id = $id;
    }

    public function value(): int
    {
        return $this->id;
    }
}