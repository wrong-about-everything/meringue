<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use DateInterval;
use Meringue\ISO8601Interval;

class HumanReadable
{
    /**
     * @var ISO8601Interval $interval
     */
    private $interval;

    public function __construct(ISO8601Interval $interval)
    {
        $this->interval = $interval;
    }

    public function value(): string
    {
        $phpInterval = new DateInterval($this->interval->value());

        return
            preg_replace(
                '/(?:\,\ )([^\,]+)$/',
                ' and $1',
                trim(
                    ($phpInterval->y === 0 ? '' : (new SingularOrPlural($phpInterval->y, 'year', 'years'))->value() . ', ') .
                    ($phpInterval->m === 0 ? '' : (new SingularOrPlural($phpInterval->m, 'month', 'months'))->value() . ', ') .
                    ($phpInterval->d === 0 ? '' : (new SingularOrPlural($phpInterval->d, 'day', 'days'))->value() . ', ') .
                    ($phpInterval->h === 0 ? '' : (new SingularOrPlural($phpInterval->h, 'hour', 'hours'))->value() . ', ') .
                    ($phpInterval->i === 0 ? '' : (new SingularOrPlural($phpInterval->i, 'minute', 'minutes'))->value() . ', ') .
                    ($phpInterval->s === 0 ? '' : (new SingularOrPlural($phpInterval->s, 'second', 'seconds'))->value()),
                    ', '
                )
            );
    }
}