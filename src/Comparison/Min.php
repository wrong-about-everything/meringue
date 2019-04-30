<?php

namespace Meringue\Comparison;

use DateTimeImmutable as PHPDateTime;
use Meringue\FormattedDateTime\CanonicalISO8601DateTime;
use Meringue\ISO8601DateTime;
use Exception;
use DateTimeImmutable;

class Min extends ISO8601DateTime
{
    /**
     * @var ISO8601DateTime[] $dateTimes
     */
    private $dateTimes;

    /**
     * Min constructor.
     * @param ISO8601DateTime ...$dateTimes
     * @throws Exception In the following cases:
     *  1. Non-ISO8601DateTime value passed
     *  2. There are less than two values passed
     */
    public function __construct(...$dateTimes)
    {
        array_walk(
            $dateTimes,
            function ($dt) {
                if (!($dt instanceof ISO8601DateTime)) {
                    throw new Exception('Non ISO8601DateTime value passed.');
                }
            }
        );

        if (count($dateTimes) < 2) {
            throw new Exception('Nothing to find since a single value passed.');
        }

        $this->dateTimes = $dateTimes;
    }

    public function value(): string
    {
        $dts = $this->dateTimes;

        usort(
            $dts,
            function ($left, $right) {
                if (new PHPDateTime($left->value()) === new PHPDateTime($right->value())) {
                    return 0;
                }

                return
                    (new PHPDateTime($left->value()) < new PHPDateTime($right->value()))
                        ? -1
                        : 1
                    ;
            }
        );

        return
            (new CanonicalISO8601DateTime(
                new DateTimeImmutable($dts[0]->value())
            ))
                ->value();
    }
}
