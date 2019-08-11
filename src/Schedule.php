<?php

namespace Meringue;

interface Schedule
{
    public function isHit(ISO8601DateTime $dateTime): bool;
}
