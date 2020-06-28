How to get the last day of a month
=====================================

If you know *what* it is that you need, you're halfway there. If you want to find the last day of a month, there must
be a class of the same name. Besides, this class must implement some kind of :code:`DateTime` interface or extend the same kind of abstract class.
This fact indicates that the last day of a month *is a* datetime. And here you go, there is a :code:`TheLastDayOfAMonth` indeed.
That's how you can obtain a last day of some datetime's month:

.. code-block:: php

    (new TheLastDayOfAMonth(
        new FromISO8601('2020-02-21T23:28:04+07:00')
    ))
        ->value(); // returns 2020-02-29T00:00:00+07:00

If you want to find the last day of the current month, simply pass a :doc:`current datetime <./how_do_you_get_a_current_datetime>`:

.. code-block:: php

    (new TheLastDayOfAMonth(
        new Now()
    ))
        ->value();

Besides, you might want to find the first day of a month. It's carried out with :code:`TheFirstDayOfAMonth` and is pretty much the same with the above:

.. code-block:: php

    (new TheFirstDayOfAMonth(
        new FromISO8601('2020-02-21T23:28:04+07:00')
    ))
        ->value(); // returns 2020-02-01T00:00:00+07:00

Getting the first day of the current month is as easy as

.. code-block:: php

    (new TheFirstDayOfAMonth(
        new Now()
    ))
        ->value();

There are similar cases covered when you need to find the beginning of something or the end of something.
For example, you can :doc:`find the beginning of a day <./how_to_get_the_beginning_of_a_day>` and
:doc:`a start of a week <./how_to_get_a_start_of_the_week_datetime>`. Besides, you can add your own shortcut class for that.