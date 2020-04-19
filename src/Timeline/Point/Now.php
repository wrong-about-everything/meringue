<?php

namespace Meringue\Timeline\Point;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime\FromPhpDateTime;
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

        $this->value = new FromPhpDateTime($now);
    }

    public function value(): string
    {
        return $this->value->value();
    }
}
