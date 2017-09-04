# Object-oriented DateTime

## Examples

// outputs true

var_dump(
    (new Max(
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
