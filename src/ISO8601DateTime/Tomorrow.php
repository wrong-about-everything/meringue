<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601Interval\Floating\OneDay;
use Meringue\Timeline\Point\Future;

class Tomorrow extends ISO8601DateTime
{
    private $givenDay;

    public function __construct(ISO8601DateTime $givenDay)
    {
        $this->givenDay = $givenDay;
    }

    public function value(): string
    {
        return
            (new Future(
                $this->givenDay,
                new OneDay()
            ))
                ->value();
    }
}
