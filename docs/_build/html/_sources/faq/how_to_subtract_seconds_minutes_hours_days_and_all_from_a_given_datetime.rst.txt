How to subtract seconds, minutes, hours, days and all from a given datetime
==============================================================================

First of all, you don't want to subtract actually. What you need is some point in the past. You can identify it by
a datetime that acts as a starting point relative to which you want to calculate the past, and an interval you want to shift your starting point by.
Here is how it might look:

.. code-block:: php

    use Meringue\ISO8601DateTime\FromISO8601 as DateTimeFromISO8601String;
    use Meringue\ISO8601Interval\Floating\FromISO8601 as IntervalFromISO8601String;

    new Past(
        new DateTimeFromISO8601String('2014-11-21T06:04:31+00:00'),
        new IntervalFromISO8601String('P1Y2M21DT24H56M26S')
    );

If you don't want any further transformation, you can invoke a :code:`value()` method and output the result:

.. code-block:: php

    (new Past(
        new DateTimeFromISO8601String('2014-11-21T06:04:31+00:00'),
        new IntervalFromISO8601String('P1Y2M21DT24H56M26S')
    ))
        ->value(); // returns 2013-08-30T05:08:05+00:00

There are some shortcuts for most typical intervals. You might benefit from :code:`OneMinute`, :code:`OneHour`, :code:`OneDay`, :code:`OneMonth`, and :code:`OneYear`.
Besides, there are :code:`N`-counterparts, just in case you need two years for example:

.. code-block:: php

    (new Past(
        new DateTimeFromISO8601String('2014-11-21T06:04:31+00:00'),
        new NYears(2)
    ))
        ->value(); // returns 2012-11-21T06:04:31+00:00

There are at least two ways actually to define an interval. The first one is already covered above: you can use standard ISO8601 interval notation, like :code:`P1Y2M21DT24H56M26S`,
or shortcut meringue classes. The second option is to :doc:`identify an interval by two dates <./how_to_calculate_a_difference_between_two_dates>`.
For example, I have to significant points in time, I have their absolute values, but I don't know an interval in advance. So I can write:

.. code-block:: php

    use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange as IntervalFromRange;

    (new IntervalFromRange(
        new FromISO8601('2017-07-03T14:27:39+00:00'),
        new FromISO8601('2017-08-28T14:29:47+00:00')
    ))
        ->value(); // returns P0Y1M25DT0H2M8S

In the same vein, you can :doc:`obtain any datetime in the future <./how_to_add_seconds_minutes_hours_days_and_all_to_php_datetime>`.

If you want to :doc:`convert it to specific timezone <./how_to_convert_a_datetime_to_specific_timezone>`, you can use :code:`AdjustedAccordingToTimeZone` class:

.. code-block:: php

    (new AdjustedAccordingToTimeZone(
        new Past(
            new DateTimeFromISO8601String('2014-11-21T06:04:31+00:00'),
            new NYears(2)
        ),
        new CET()
    ))
        ->value(); // returns 2012-11-21T07:04:31+01:00
