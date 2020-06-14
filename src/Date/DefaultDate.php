<?php

declare(strict_types=1);

namespace Meringue\Date;

use Meringue\Date;
use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class DefaultDate extends Date
{
    private $y;
    private $m;
    private $d;

    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->y = $year;
        $this->m = $month;
        $this->d = $day;
    }

    public function value(): string
    {
        return
            sprintf(
                '%s-%02d-%02d',
                $this->y->value(),
                $this->m->value(),
                $this->d->value()
            );
    }
}