<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToSeconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class SingularOrPlural
{
    private $number;
    private $singular;
    private $plural;

    public function __construct(int $number, string $singular, string $plural)
    {
        $this->number = $number;
        $this->singular = $singular;
        $this->plural = $plural;
    }

    public function value(): string
    {
        return
            sprintf(
                '%d %s',
                $this->number,
                $this->number === 1
                    ? $this->singular
                    : $this->plural
            );
    }
}