<?php

declare(strict_types=1);

namespace Meringue\Schedule;

use Meringue\ISO8601DateTime;
use Meringue\Schedule;

class Monthly implements Schedule
{
    private $usual;
    private $except;

    public function __construct(Schedule $usual, Schedule $except)
    {
        $this->usual = $usual;
        $this->except = $except;
    }

    public function isHit(ISO8601DateTime $dateTime): bool
    {
        if ($this->except->isHit($dateTime)) {
            return false;
        }

        return $this->usual->isHit($dateTime);
    }

    public function for(ISO8601DateTime $dateTime): array
    {
        return $this->usual->for($dateTime);
    }
}
