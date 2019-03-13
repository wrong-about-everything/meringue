<?php

namespace Meringue;

interface Time
{
    /**
     * Time in ISO8601
     * @return string
     */
    public function value(): string;
}
