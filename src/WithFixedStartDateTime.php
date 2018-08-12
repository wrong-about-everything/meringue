<?php

namespace src;

interface WithFixedStartDateTime extends ISO8601Interval
{
    public function starts(): ISO8601DateTime;

    public function ends(): ISO8601DateTime;
}
