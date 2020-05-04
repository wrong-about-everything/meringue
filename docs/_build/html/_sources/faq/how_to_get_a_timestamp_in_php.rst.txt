How to get a timestamp in php
================================

First of all, what is a unix timestamp? It's a number of seconds since 00:00:00, January 1st, 1970 UTC.
When you already know **what** you want, instead of **how** you want it, you're good to go and discover if there is a class that serves your needs.
In the case of a timestamp, there is one, and it's called :code:`SecondsSinceJanuary1st1970`. If you want to find out current unix timestamp,
you can pass current datetime as an argument:

.. code-block:: php

   $c = new SecondsSinceJanuary1st1970(new Now());

In the same vein, you can pass any other ISO8601 datetime:

.. code-block:: php

   $c =
      new SecondsSinceJanuary1st1970(
         new Max(
            new Now(),
            new Future(
               new FromISO8601('1986-05-04 00:30:00+03'),
               new NYears(34)
            )
         )
      );

As usual, if you want a textual representation, :code:`value()` method is just for that.