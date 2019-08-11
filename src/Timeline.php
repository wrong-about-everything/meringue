<?php

namespace Meringue;

interface Timeline
{
    public function now(): ISO8601DateTime;
}
