<?php

namespace Meringue\Timeline;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class Now extends ISO8601DateTime
{
    private $value;

    public function __construct()
    {
        $microtime = microtime(true);

        $now = PHPDateTime::createFromFormat('U.u', $microtime);
        if ($now === false) {
            $now = PHPDateTime::createFromFormat('U', $microtime);
        }

        $this->value = $now->format('Y-m-d\TH:i:s.uP');
    }

    public function value(): string
    {
        return $this->value;
    }
}
