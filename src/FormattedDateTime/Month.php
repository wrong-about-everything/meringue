<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class Month
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function numeric()
    {
        return (new PHPDateTime($this->dt->value()))->format('m');
    }

    public function fullName()
    {
        return strftime('%B', (int) (new ToSeconds($this->dt))->value());
    }

    public function abbreviated()
    {
        return strftime('%b', (int) (new ToSeconds($this->dt))->value());
    }

    public function numberOfDays()
    {
        return (new PHPDateTime($this->dt->value()))->format('t');
    }
}