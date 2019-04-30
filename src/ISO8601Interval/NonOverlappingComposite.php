<?php

namespace Meringue\ISO8601Interval;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\WithFixedStartDateTime;
use Exception;

class NonOverlappingComposite implements WithFixedStartDateTime
{
    private $dts;

    public function __construct(WithFixedStartDateTime ... $dts)
    {
        if (count($dts) < 1) {
            throw new Exception('At least one interval required');
        }

        usort(
            $dts,
            function (WithFixedStartDateTime $left, WithFixedStartDateTime $right) {
                return
                    new PHPDateTime($left->starts()->value()) < new PHPDateTime($right->starts()->value())
                        ? -1
                        : 1
                    ;
            }
        );

        array_reduce(
            $dts,
            function (WithFixedStartDateTime $current, WithFixedStartDateTime $next) {
                if (new PHPDateTime($current->ends()->value()) > new PHPDateTime($next->starts()->value())) {
                    throw new Exception('Intervals can not overlap');
                }

                return $next;
            },
            new FromRange(
                new FromTimestamp(0),
                new FromTimestamp(1)
            )
        );

        $this->dts = $dts;
    }

    public function starts(): ISO8601DateTime
    {
        return $this->dts[0]->starts();
    }

    public function ends(): ISO8601DateTime
    {
        return $this->dts[count($this->dts) - 1]->ends();
    }

    public function value(): string
    {
        return
            (new PHPDateTime($this->ends()->value()))
                ->diff(
                    new PHPDateTime($this->starts()->value())
                )
                    ->format("P%yY%mM%dDT%hH%iM%sS")
            ;
    }
}
