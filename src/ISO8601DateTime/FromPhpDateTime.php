<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use DateTimeInterface;
use Meringue\ISO8601DateTime;

class FromPhpDateTime extends ISO8601DateTime
{
    private $s;

    public function __construct(DateTimeInterface $s)
    {
        $this->s = $s;
    }

    public function value(): string
    {
        if ((int) $this->s->format('u') != 0) {
            return $this->s->format('Y-m-d\TH:i:s.uP');
        }

        return $this->s->format('c');
    }
}
