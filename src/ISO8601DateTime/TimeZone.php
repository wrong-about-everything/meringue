<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

interface TimeZone
{
    public function value(): string;
}
