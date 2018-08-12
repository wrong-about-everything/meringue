<?php

namespace ooDateTime;

require_once 'vendor/autoload.php';

use src\comparison\DateTimeComparisonResult;
use src\comparison\Max;
use src\formattedDateTime\ToSeconds;
use src\ISO8601DateTime\FromMilliseconds;
use src\ISO8601Interval\FromRange;
use src\timeline\Future;
use src\timeline\Past;
use src\timeline\Now;
use src\ISO8601DateTime\FromISO8601;
use src\ISO8601Interval\FromISO8601 as ISO8601Interval;


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
