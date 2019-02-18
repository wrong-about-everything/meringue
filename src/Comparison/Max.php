<?php

namespace Meringue\Comparison;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;
use \Exception;

class Max extends ISO8601DateTime
{
    /**
     * @var ISO8601DateTime[] $dateTimes
     */
    private $dateTimes;

    /**
     * Max constructor.
     * @param ISO8601DateTime ...$dateTimes
     * @throws Exception In case when there are less than two values passed
     */
    public function __construct(ISO8601DateTime ... $dateTimes)
    {
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
                    (new PHPDateTime($left->value()) > new PHPDateTime($right->value()))
                        ? -1
                        : 1
                    ;
            }
        );

        return $dts[0]->value();
    }
}