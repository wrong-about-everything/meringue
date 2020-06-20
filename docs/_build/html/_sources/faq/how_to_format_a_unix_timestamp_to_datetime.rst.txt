How to convert a Unix timestamp to DateTime
=============================================
Since I always try to find *what* I need instead of *how* to get there, I don't use the lingo from the title, like "how to *do* anything".
In case of the current post, I create a datetime from Unix timestamp, or, in other words, a datetime *converted* from Unix timestamp.

How to create a datetime object from Unix timestamp
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

First off, `Unix timestamp <https://en.wikipedia.org/wiki/Unix_time>`_ is a number of seconds since January, 1st, 1970, UTC. If you've skimmed through that date,
mind that it contains a timezone, and it is UTC. Thus, there is no such thing as Unix timestamp in CET or Los-Angeles timezone.
There is always the single Unix timestamp. It's like the single moment in absolute timescale, but it just happens so that
different countries have different local time.

To bring my point home, consider a timestamp which equals to :code:`1504534440`. If you wonder what time it is in UTC, here you go:

.. code-block:: php

   (new FromTimestamp(1504534440))->value(); // returns 2017-09-04T14:14:00+00:00

At the same moment in time, most people in Kalinigrad already have had a dinner:

.. code-block:: php

   (new AdjustedAccordingToTimeZone(
       new FromTimestamp(1504534440),
       new Kaliningrad()
   ))
       ->value(); // it's 2017-09-04T16:14:00+02:00

And still at the same moment in time, it's an early morning in Honolulu:

.. code-block:: php

   (new AdjustedAccordingToTimeZone(
       new FromTimestamp(1504534440),
       new HawaiiWithNoDST()
   ))
       ->value(); // 2017-09-04T04:14:00-10:00

After you've got an :code:`ISO8601DateTime` object, you can do some more:
:doc:`subtract seconds, minutes, hours, days, months, years <./how_to_subtract_seconds_minutes_hours_days_and_all_from_a_given_datetime>` from it,
:doc:`calculate a difference between datetimes <./how_to_calculate_a_difference_between_two_dates>`, :doc:`format it anyway you like <./how_to_format_a_php_date>`,
and much more. Consider :doc:`quick start entry <../quick_start>` for more info.

And the other way round
^^^^^^^^^^^^^^^^^^^^^^^^^

What if you need to :doc:`convert a datetime object into Unix timestamp <./how_to_get_a_timestamp_in_php>`? Since *what* you need is a number of seconds since January, 1st, 1970 UTC,
there is a special class for that: :code:`SecondsSinceJanuary1st1970`. Here is how it's invoked:

.. code-block:: php

   (new SecondsSinceJanuary1st1970(
       new FromISO8601('2014-11-21T06:04:31+00:00')
   ))
       ->value(); // returns 1416549871

If you wonder why I have so many classes, check out :doc:`my philosophy <../meringue_philosophy>`.