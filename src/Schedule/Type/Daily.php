<?php

declare(strict_types=1);

namespace Meringue\Schedule\Type;

class Daily extends Type
{
    public function value(): int
    {
        return 2;
    }

    public function equals(Type $type)
    {
        return in_array($type->value(), [$this->value(), (new DailyInLocalTimeZone())->value(), (new DailyInUTC())->value()]);
    }
}