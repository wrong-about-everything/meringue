<?php

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class WithCallback
{
    private $dt;
    private $callable;

    public function __construct(ISO8601DateTime $dateTime, callable $callable)
    {
        $this->dt = $dateTime;
        $this->callable = $callable;
    }

    public function value()
    {
        return ($this->callable)($this->dt);
    }
}