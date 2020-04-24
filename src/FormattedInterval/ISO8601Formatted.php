<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use DateInterval;
use Meringue\ISO8601Interval;

class ISO8601Formatted
{
    /**
     * @var ISO8601Interval $interval
     */
    private $interval;
    private $callback;

    public function __construct(ISO8601Interval $interval, callable $callback)
    {
        $this->interval = $interval;
        $this->callback = $callback;
    }

    public function value(): string
    {
        $phpInterval = new DateInterval($this->interval->value());

        return ($this->callback)($phpInterval->y, $phpInterval->m, $phpInterval->d, $phpInterval->h, $phpInterval->i, $phpInterval->s);
    }
}