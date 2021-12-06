How to obtain the first day of a week
======================================

Start of a week *is a* specific datetime. Looking at this sentence, I can draw two points. The first one is that I need a class called
:code:`StartOfTheWeek` which denotes a subject in a proposition :code:`Start of a week is a specific datetime`. The predicate,
`is a specific datetime`, clearly tells me that this class should either implement some sort of :code:`DateTime` interface or extend the same sort
of abstract class. And you know what? There is one already, and it's called an :code:`ISO8601DateTime`.

Alright, :doc:`no more philosophy <../meringue_philosophy>`, let's just get right into it.
Which weekday is the first day of the week? Since this datetime is in ISO8601 format, it dictates us that a week starts on Monday.
It might differ depending on cultural traditions of course, but this standard is culture-agnostic, so it's always Monday.

Here is how you can actually get the start of a week in code:

.. code-block:: php

   (new StartOfTheWeek(
       new FromISO8601('2020-04-23T01:28:04+07:00')
   ))
       ->value(); // returns 2020-04-20T00:00:00+07:00, which is Monday indeed

If you need to obtain the first day of the *current* week, just pass the :doc:`current datetime <./how_do_you_get_a_current_datetime>`:

.. code-block:: php

   (new StartOfTheWeek(
       new Now()
   ))
       ->value();

And if you want just a `date <https://github.com/wrong-about-everything/meringue/blob/master/src/Date/FromISO8601DateTime.php>`_ of the beginning of the week, instead of a datetime, you can do the following:

.. code-block:: php

   (new FromISO8601DateTime(
       new StartOfTheWeek(
           new FromISO8601('2020-04-23T01:28:04+07:00')
       )
   ))
       ->value(); // returns '2017-04-20' string

Finally, in case you want to find the last day of the week, you can do simple math. Just get the first day, and then :doc:`add six days to it <./how_to_add_seconds_minutes_hours_days_and_all_to_php_datetime>`:

.. code-block:: php

    (new Future(
        new StartOfTheWeek(
            new FromISO8601('2020-04-23T01:28:04+07:00')
        ),
        new NDays(6)
    ))
        ->value() // returns 2020-04-26T00:00:00+07:00

If you find that having a distinct class for getting the last day of a week would be more convenient, you can write it and `create a pull request <https://github.com/wrong-about-everything/meringue>`_.
If tests are in place and code is OK, I'll merge it pretty soon.