<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Exception;

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
     *  2. Nothing passed
     */
    public function __construct(... $dateTimes)
    {
        if (count($dateTimes) < 1) {
            throw new Exception('At least one datetime is required.');
        }

        array_walk(
            $dateTimes,
            function ($dt) {
                if (!($dt instanceof ISO8601DateTime)) {
                    throw new Exception('Non ISO8601DateTime value passed.');
                }
            }
        );

        $this->dateTimes = $dateTimes;
    }

    public function value(): string
    {
        $dts = $this->dateTimes;

        usort(
            $dts,
            function (ISO8601DateTime $left, ISO8601DateTime $right) {
                if ($left->equalsTo($right)) {
                    return 0;
                }

                return
                    ($left->earlierThan($right))
                        ? -1
                        : 1
                    ;
            }
        );

        return (new FromISO8601($dts[0]->value()))->value();
    }
}
