<?php

namespace Meringue\ISO8601Interval\WithFixedStartDateTime;

use DateTimeImmutable as PHPDateTime;
use Exception;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval\WithFixedStartDateTime;
use Meringue\Timeline\Point\Now;

class Shortest extends WithFixedStartDateTime
{
    private $shortest;

    public function __construct(WithFixedStartDateTime ... $intervals)
    {
        usort(
            $intervals,
            function (WithFixedStartDateTime $left, WithFixedStartDateTime $right) {
                if ($left->equalsTo($right)) {
                    return 0;
                }

                return $left->longerThan($right) ? 1 : -1;
            }
        );
        $this->shortest = $intervals[0];
    }

    public function starts(): ISO8601DateTime
    {
        return $this->shortest->starts();
    }

    public function ends(): ISO8601DateTime
    {
        return $this->shortest->ends();
    }

    public function value(): string
    {
        return $this->shortest->value();
    }
}