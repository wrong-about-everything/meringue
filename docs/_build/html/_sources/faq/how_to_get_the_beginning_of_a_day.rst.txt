How to get the beginning of a day
====================================

Just like with any other development task, first I try to identify *what* I need. As the title goes, "how to get *the beginning of a day*".
Thus, I need the beginning of any given day. As a result, there is a class which is called exactly like that:
:code:`TheBeginningOfADay`. In turn, what is it? It's a specific datetime actually. Hence no wonder that this class extends :code:`ISO8601DateTime` abstract class.

So, obtaining the beginning of any given day from a datetime goes like the following:

.. code-block:: php

   (new TheBeginningOfADay(
       new FromISO8601('2014-11-21 08:12:54-11:30')
   ))
       ->value();

If you need the beginning of :doc:`a current datetime <../how_do_you_get_a_current_datetime>`, it goes like that:

.. code-block:: php

   (new TheBeginningOfADay(
       new Now()
   ))
       ->value();

If you want to get just a date from a datetime, things change. What you need is a *date*, not a datetime. Thus, the class
you should use definitely implements a :code:`Date` interface (or a corresponding abstract class). The class we need in our case
is a :code:`FromISO8601DateTime`. It's read as :code:`A date obtained from an ISO8601 datetime`, and an abstract class implies that
there is a single property that an object can tell you about: it is its textual representation, or :code:`value`, which is just more concise.

Here goes the code:

.. code-block:: php

   (new FromISO8601DateTime(
       new FromISO8601('2017-07-03T00:00:00+00:00')
   ))
       ->value(); // results into '2017-07-03' string

If you want to format it some peculiar way, you have two options: either built-in php ISO8601 formatting facility, or, if you want
to localize your datetime, you'd want to opt into `the IntlDateFormatter class <https://www.php.net/manual/en/class.intldateformatter.php>`_.