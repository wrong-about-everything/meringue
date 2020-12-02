<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime\PhpSpecificTimeZone;

use Meringue\ISO8601DateTime\PhpSpecificTimeZone;
use Exception;

class FromString implements PhpSpecificTimeZone
{
    private $timezone;

    public function __construct(string $timezone)
    {
        if (!in_array($timezone, timezone_identifiers_list())) {
            throw new Exception(sprintf('Timezone {{%s}} does not exists', $timezone));
        }

        $this->timezone = $timezone;
    }

    public function value(): string
    {
        return $this->timezone;
    }
}
