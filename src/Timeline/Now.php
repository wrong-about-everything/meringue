<?php

namespace Meringue\Timeline;

use DateTimeImmutable as PHPDateTime;
use Meringue\FormattedDateTime\CanonicalISO8601DateTime;
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

        $this->value = new CanonicalISO8601DateTime($now);
    }

    public function value(): string
    {
        return $this->value->value();
    }
}
