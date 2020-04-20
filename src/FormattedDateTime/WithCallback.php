<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;

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