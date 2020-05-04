<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;
use Exception;

class FromCustomFormat extends ISO8601DateTime
{
    private $format;
    private $dateTime;

    public function __construct(string $format, string $dateTime)
    {
        $this->format = $format;
        $this->dateTime = $dateTime;
    }

    public function value(): string
    {
        if (!$this->isValid()) {
            throw new Exception('Datetime has an invalid format');
        }

        return
            (new FromPhpDateTime(
                PHPDateTime::createFromFormat($this->format, $this->dateTime)
            ))
                ->value()
            ;
    }

    public function isValid(): bool
    {
        $date = PHPDateTime::createFromFormat($this->format, $this->dateTime);

        return $date && $date->format($this->format) === $this->dateTime;
    }
}
