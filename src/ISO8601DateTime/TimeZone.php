<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

interface TimeZone
{
    /**
     * ISO8601 timezone representation,
     * for example -11:30, +07:00
     */
    public function value(): string;
}
