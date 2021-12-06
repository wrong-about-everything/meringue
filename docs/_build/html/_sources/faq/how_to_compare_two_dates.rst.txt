How to compare two dates
=========================

You can use built-in :code:`ISO8601DateTime` methods for that: :code:`equalsTo()`, :code:`laterThan()`, and :code:`earlierThan()`.

But, as usual, ask yourself a question what you really need. Chances are you don't need to compare; you need a maximum or minimum date instead.
If so, I've got you covered: :code:`Min` and :code:`Max` are what you're looking for:

.. code-block:: php

   $m =
      new Max(
         new Now(),
         new Future(
            new FromISO8601('1986-05-04 00:30:00+03'),
            new NYears(34)
         )
      );

After you got what you need, you can proceed to textual representation. :code:`value()` method returns an ISO8601 string value.
There are :doc:`fancier ways <how_to_format_a_php_date>` to format datetime either.