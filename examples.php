<?php

namespace ooDateTime;

require_once 'autoload.php';

use ooDateTime\src\comparison\DateTimeComparisonResult;
use ooDateTime\src\formattedDateTime\ToMilliseconds;
use ooDateTime\src\ISO8601DateTime\FromMilliseconds;
use ooDateTime\src\ISO8601Interval\FromRange;
use ooDateTime\src\timeline\Future;
use ooDateTime\src\timeline\Past;
use ooDateTime\src\timeline\Now;
use ooDateTime\src\ISO8601DateTime\FromISO8601;
use ooDateTime\src\ISO8601Interval\FromISO8601 as ISO8601Interval;

var_dump(
    (new DateTimeComparisonResult(
        new Future(
            new Past(
                new FromMilliseconds(
                    (new ToMilliseconds(
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
        ->secondOneIsGreater()
);

//var_dump(
//    (new DateTimeComparisonResult(
//        new Future(
//            new Past(
//                new Now(),
//                new FromRange(
//                    new Now(),
//                    new Future(
//                        new Now(),
//                        new ISO8601Interval('PT1S')
//                    )
//                )
//            ),
//            new ISO8601Interval('PT1S')
//        ),
//        new Now()
//    ))
//        ->areEqual()
//);
