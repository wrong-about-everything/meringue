<?php

namespace Meringue\Timeline;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class Now extends ISO8601DateTime
{
    private $value;

    public function __construct()
    {
        $now = false;
        while (!$now) {
            $now = PHPDateTime::createFromFormat('U.u', microtime(true));
        }

        $this->value = $now->format('Y-m-d\TH:i:s.uP');
    }

    public function value(): string
    {
        return $this->value;
    }
}
