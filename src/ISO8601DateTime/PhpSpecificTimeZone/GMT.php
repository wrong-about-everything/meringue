<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime\PhpSpecificTimeZone;

use Meringue\ISO8601DateTime\PhpSpecificTimeZone;

class GMT implements PhpSpecificTimeZone
{
    public function value(): string
    {
        return 'GMT';
    }
}
