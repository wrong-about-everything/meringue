<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Exception;

class Max extends ISO8601DateTime
{
    /**
     * @var ISO8601DateTime[] $dateTimes
     */
    private $dateTimes;

    /**
     * @param ISO8601DateTime ...$dateTimes
     * @throws Exception In case when there are less than two values passed
     */
    public function __construct(ISO8601DateTime ... $dateTimes)
    {
        if (count($dateTimes) < 1) {
            throw new Exception('At least one datetime required.');
        }

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
                    ($left->laterThan($right))
                        ? -1
                        : 1
                    ;
            }
        );

        return (new FromISO8601($dts[0]->value()))->value();
    }
}
