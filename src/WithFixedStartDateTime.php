<?php

namespace Meringue;

interface WithFixedStartDateTime
{
    public function starts(): ISO8601DateTime;

    public function ends(): ISO8601DateTime;

    public function value(): string;
}
