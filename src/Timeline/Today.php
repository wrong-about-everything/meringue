<?php

declare(strict_types=1);

namespace Meringue\Timeline;

use DateTimeImmutable as PHPDateTime;
use Meringue\FormattedDateTime\CanonicalISO8601DateTime;
use Meringue\ISO8601DateTime;

class Today extends ISO8601DateTime
{
    public function value(): string
    {
        return
            (new CanonicalISO8601DateTime(
                (new PHPDateTime('today'))
            ))
                ->value();
    }
}