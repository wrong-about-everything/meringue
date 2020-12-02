<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime\TimeZone;

use Exception;
use Meringue\ISO8601DateTime\TimeZone;

class FromString implements TimeZone
{
    private $offset;

    public function __construct(string $offset)
    {
        if (!$this->isValid($offset)) {
            throw new Exception(sprintf('Offset %s is invalid', $offset));
        }

        $this->offset = $offset;
    }

    public function value(): string
    {
        return $this->offset;
    }

    private function isValid(string $offset)
    {
        if (strcasecmp(mb_substr($offset, -1), 'z') === 0) {
            return true;
        }

        return preg_match('#^[\+\-]{1}[0-1]{1}[0-9]{1}[\:]?(?:[0-5]{1}[0-9]{1})?$#', $offset) === 1;
    }
}
