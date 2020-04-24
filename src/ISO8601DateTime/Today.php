<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use DateTimeImmutable as PHPDateTime;
use Meringue\ISO8601DateTime\FromPhpDateTime;
use Meringue\ISO8601DateTime;

class Today extends ISO8601DateTime
{
    public function value(): string
    {
        return
            (new FromPhpDateTime(
                (new PHPDateTime('today'))
            ))
                ->value();
    }
}
