<?php

namespace src\formattedDateTime;

use src\ISO8601DateTime;
use src\ISO8601DateTime\FromCustomFormat;
use DateTimeImmutable as PHPDateTime;

class Year
{
    private $dt;

    static public function fromIso8601DateTime(ISO8601DateTime $dateTime)
    {
        return new Year($dateTime);
    }

    static public function fromInt(int $int)
    {
        return new Year(new FromCustomFormat('Y', (string) $int));
    }

    private function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function full()
    {
        return (new PHPDateTime($this->dt->value()))->format('Y');
    }

    public function twoLastDigits()
    {
        return strftime('%y', (new ToSeconds($this->dt))->value());
    }

    public function isLeap()
    {
        return (int) ((new PHPDateTime($this->dt->value()))->format('L')) === 1;
    }

    public function equalsTo(Year $year)
    {
        return $this->full() == $year->full();
    }
}