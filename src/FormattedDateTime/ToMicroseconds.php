<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime;

class ToMicroseconds
{
    private $s;

    public function __construct(ISO8601DateTime $s)
    {
        $this->s = $s;
    }

    public function value(): int
    {
        return (int) (new PHPDateTime($this->s->value()))->format('Uu');
    }
}