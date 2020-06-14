<?php

declare(strict_types=1);

namespace Meringue\Time;

use Meringue\Time;
use Meringue\Time\Hour\FromInt as Hours;
use Meringue\Time\Minute\FromInt as Minutes;
use Meringue\Time\Second\FromInt as Seconds;

class FromIntegers extends Time
{
    private $time;

    public function __construct(int $hours, int $minutes, int $seconds)
    {
        $this->time = new DefaultTime(new Hours($hours), new Minutes($minutes), new Seconds($seconds));
    }

    public function value(): string
    {
        return $this->time->value();
    }
}
