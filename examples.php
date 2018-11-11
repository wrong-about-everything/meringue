<?php

namespace ooDateTime;

require_once 'vendor/autoload.php';

use Meringue\comparison\DateTimeComparisonResult;
use Meringue\comparison\Max;
use Meringue\formattedDateTime\ToSeconds;
use Meringue\ISO8601DateTime\FromMilliseconds;
use Meringue\ISO8601Interval\FromRange;
use Meringue\timeline\Future;
use Meringue\timeline\Past;
use Meringue\timeline\Now;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\FromISO8601 as ISO8601Interval;


// outputs true

var_dump(
    (new Max(
        new Future(
            new Past(
                new FromMilliseconds(
                    (new ToSeconds(
                        new FromISO8601('2017-08-18T15:08:13+04:00')
                    ))
                        ->value()
                ),
                new ISO8601Interval('P1Y2M21DT24H56M26S')
            ),
            new ISO8601Interval('PT23H')
        ),
        new Now()
    ))
        ->equalsTo(new Now())
);


// outputs true

var_dump(
    (new Future(
        new Past(
            new Now(),
            new FromRange(
                new Now(),
                new Future(
                    new Now(),
                    new ISO8601Interval('PT1S')
                )
            )
        ),
        new ISO8601Interval('PT1S')
    ))
        ->equalsTo(new Now())
);
