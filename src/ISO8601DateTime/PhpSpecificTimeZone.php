<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

interface PhpSpecificTimeZone
{
    /**
     * PHP-specific timezone representation,
     * for example Europe/Moscow, Pacific/Honolulu
     */
    public function value(): string;
}
