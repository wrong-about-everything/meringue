<?php

declare(strict_types=1);

namespace Meringue\Timeline;

use Meringue\ISO8601DateTime;
use Meringue\Timeline;
use Meringue\Timeline\Point\Now;

class Fake implements Timeline
{
    private $dateTime;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function now(): ISO8601DateTime
    {
        return $this->dateTime;
    }
}
