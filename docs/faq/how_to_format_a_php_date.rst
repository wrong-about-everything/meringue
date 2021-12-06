How to format a date
========================

Meringue datetime formatting relies on ISO8601 standard. It simply mirrors the behavior of built-in php `date <https://www.php.net/manual/en/function.date.php>`_ function.
You might ask why on Earth I did this if no new features are introduced. The intention is that I personally didn't want to derail from a customary set of abstractions.
It feels natural to work with :code:`ISO8601DateTime` objects across-the-board. I'd like to obtain its value only when I need to output it:
either for a :code:`stdout`, or for a database. If I used a :code:`date` function, I'd need to invoke a :code:`ISO8601DateTime`'s :code:`value()` method each time.
I wanted to avoid it, so here is how my code looks like:

.. code-block:: php

    (new ISO8601Formatted(
        new FromISO8601('2017-07-03T14:27:39+04:30'),
        'l jS'
    ))
        ->value(); // returns Monday 3rd

Object composition just looks more neatly to my taste. It adds uniformity.