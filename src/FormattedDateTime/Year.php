<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;
use Meringue\ISO8601DateTime\FromCustomFormat;
use DateTimeImmutable as PHPDateTime;

class Year
{
    private $dt;

    static public function fromIso8601DateTime(ISO8601DateTime $dateTime)
    {
        return new self($dateTime);
    }

    static public function fromInt(int $int)
    {
        return new self(new FromCustomFormat('Y-m-d', sprintf('%d-%02d-%02d', (string) $int, 1, 1)));
    }

    private function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function full()
    {
        return (new PHPDateTime($this->dt->value()))->format('Y');
    }

    public function isLeap()
    {
        return (int) ((new PHPDateTime($this->dt->value()))->format('L')) === 1;
    }

    public function equalsTo(Year $year)
    {
        return $this->full() === $year->full();
    }
}
