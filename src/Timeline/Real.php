<?php

declare(strict_types=1);

namespace Meringue\Timeline;

use Meringue\ISO8601DateTime;
use Meringue\Timeline;
use Meringue\Timeline\Point\Now;

class Real implements Timeline
{
    public function now(): ISO8601DateTime
    {
        return new Now();
    }
}
