<?php

namespace Meringue\ISO8601Interval\WithFixedStartDateTime;

use DateTimeImmutable as PHPDateTime;
use Exception;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval\WithFixedStartDateTime;
use Meringue\Timeline\Point\Now;

class Longest extends WithFixedStartDateTime
{
    private $longest;

    public function __construct(WithFixedStartDateTime ... $intervals)
    {
        usort(
            $intervals,
            function (WithFixedStartDateTime $left, WithFixedStartDateTime $right) {
                if ($left->equalsTo($right)) {
                    return 0;
                }

                return $left->longerThan($right) ? -1 : 1;
            }
        );
        $this->longest = $intervals[0];
    }

    public function starts(): ISO8601DateTime
    {
        return $this->longest->starts();
    }

    public function ends(): ISO8601DateTime
    {
        return $this->longest->ends();
    }

    public function value(): string
    {
        return $this->longest->value();
    }
}