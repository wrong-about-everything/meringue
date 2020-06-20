How to create a datetime from a custom format
===============================================

With built-in `php formatting facilities <https://www.php.net/manual/en/function.date.php>`_, you can create a datetime from however crazy sign sequence.

First, consider pretty standard ISO8601 string: :code:`2018-12-31T23:12:59+0200`. It has an :code:`Y-m-d\TH:i:sO` ISO8601 format.
So, the following code results into almost identical datetime string (mind last colon sign in timezone offset):

.. code-block:: php

   (new FromCustomFormat(
       'Y-m-d\TH:i:sO',
       '2018-12-31T23:12:59+0200'
   ))
       ->value(); // returns a '2018-12-31T23:12:59+02:00' string

Now consider a more esoteric sequence, say, :code:`122018--31TT!23:12:59+0200`. If you take a close look, it has a :code:`mY--d\T\T\!H:i:sO` format.
Indeed, the following code returns :code:`2018-12-31T23:12:59+02:00`:

.. code-block:: php

   (new FromCustomFormat(
       'mY--d\T\T\!H:i:sO',
       '122018--31TT!23:12:59+0200'
   ))
       ->value();

After you've obtained an :code:`ISO8601DateTime` object, you can do lots of stuff:
:doc:`add seconds, minutes, hours, days, months, years <./how_to_add_seconds_minutes_hours_days_and_all_to_php_datetime>` to it,
:doc:`calculate a difference between datetimes <./how_to_calculate_a_difference_between_two_dates>`, :doc:`convert it into any other timezone <./how_to_convert_a_datetime_to_specific_timezone>`,
and much more. Consider :doc:`quick start entry <../quick_start>` for more info.