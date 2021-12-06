How to calculate a datetime by a day of any week
================================================

Say, you want to know what date was on some particular Tuesday. Now the question is, how's that Tuesday identified?

By specific week and day of week
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
The first option is that you know that June, 5th, 2020 happened to belong to the week you're interested in.
In this case, we could split this problem into two easier tasks: first, we find the specific week you're interested in, and after that, we can find which date was Tuesday.
The first task can be carried out by the :code:`Meringue\Date\Week\FromISO8601DateTime` class, which *is a* :code:`Week`.
In other words, it represents a week that the passed datetime falls under:

.. code-block:: php

    (new FromISO8601DateTime(
        new FromISO8601('2020-06-27T15:47:11+07:30')
    ))
        ->value();

The week above starts at 2020-06-22T00:00:00+07:30. Semantics of the :code:`value()` method is exactly that: it's the :doc:`beginning of the week <./how_to_get_a_start_of_the_week_datetime>`.
Actually, it doesn't really matter. What matters is that :code:`FromISO8601DateTime` represents the week we need.

After that, we can find a datetime of that week's Tuesday. Once again, what we need is a datetime which is identified by a week and a day of a week. Here it goes:

.. code-block:: php

    (new FromWeekAndDayOfAWeek(
        new FromISO8601DateTime(
            new FromISO8601('2020-06-27T15:47:11+07:30')
        ),
        new Tuesday()
    ))
        ->value(); // voila, 2020-06-23T00:00:00+07:30

By specific week and day of week
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
The second option is when you know exactly how many weeks ago was your Tuesday. In this case, you can find Tuesday of your current week,
and then calculate a datetime which was N weeks ago. For example, today is June 24th, and I want to find out a datetime of Tuesday that was three weeks ago.
Here's how it can be done:

.. code-block:: php

    (new FromWeekAndDayOfAWeek(
        new FromISO8601DateTime(
            new FromISO8601('2020-06-27T15:47:11+07:30')
        ),
        new Tuesday()
    ))
        ->value(); // voila, 2020-06-23T00:00:00+07:30

I'm sure there are many more interesting cases. Most of them though can be solved with basic building blocks from this library.