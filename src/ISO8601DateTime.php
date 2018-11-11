<?php

namespace Meringue;

interface ISO8601DateTime
{
    public function value(): string;

    public function equalsTo(ISO8601DateTime $dateTime): bool;
}
