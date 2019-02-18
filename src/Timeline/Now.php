<?php

namespace Meringue\Timeline;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class Now extends ISO8601DateTime
{
    public function __construct()
    {
    }

    public function value(): string
    {
        return (new PHPDateTime('now'))->format('c');
    }
}