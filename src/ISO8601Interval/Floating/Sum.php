<?php

declare(strict_types=1);

namespace Meringue\ISO8601Interval\Floating;

use DateInterval;
use Meringue\ISO8601Interval;
use Meringue\ISO8601Interval\FloatingInterval;

class Sum implements FloatingInterval
{
    private $intervals;

    public function __construct(ISO8601Interval ... $intervals)
    {
        $this->intervals = $intervals;
    }

    public function value(): string
    {
        return
            (new FromPhpInterval(
                array_reduce(
                    array_map(
                        function (ISO8601Interval $i) {
                            return new DateInterval($i->value());
                        },
                        $this->intervals
                    ),
                    function (DateInterval $total, DateInterval $current) {
                        $total->y = $total->y + $current->y;
                        $total->m = $total->m + $current->m;
                        $total->d = $total->d + $current->d;
                        $total->h = $total->h + $current->h;
                        $total->i = $total->i + $current->i;
                        $total->s = $total->s + $current->s;

                        return $total;
                    },
                    new DateInterval('P0Y0M0DT0H0M0S')
                )
            ))
                ->value()
            ;
    }
}