<?php

namespace ooDateTime\src;

interface ISO8601DateTime
{
    public function value();

    public function equalsTo(ISO8601DateTime $dateTime);
}
