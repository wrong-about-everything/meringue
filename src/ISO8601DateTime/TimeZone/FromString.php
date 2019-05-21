<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime\TimeZone;

use Meringue\ISO8601DateTime\TimeZone;
use Exception;

class FromString implements TimeZone
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
