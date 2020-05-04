How to add seconds, minutes, hours, days and all to php datetime
==================================================================

As usual, the key is not **how** to do something, but **what** do you want to have. You don't need to add anything,
you want some datetime in the future instead. This approach is known as `declarative programming <https://en.wikipedia.org/wiki/Declarative_programming>`_.
But this declarative nature is just a consequence of a :doc:`deeper-rooted philosophy behind meringue library <../meringue_philosophy>`: focus on abstractions.
To do that, keep an eye on linguistic concepts the problem is formulated with. Look for naturally occurring categories: universally accepted and ubiquitous concepts, called natural kinds.

So, if you want some datetime in the future, that is, a future datetime, it's easy to guess the class name: :code:`Future`.
If you look at the declaration, you'll see :code:`class Future extends ISO8601DateTime`. It's translated to English as
"future **is a** ISO8601 datetime". Or, "future falls under a category known as ISO8601 datetime". So here is how to get a future which is two minutes away from any given datetime:

.. code-block:: php

   $f =
      new Future(
         new FromISO8601('2020-05-04 18:26:54+03'),
         new NMinutes(2)
      );

Methods are mostly text representation of an object. The one of a ISO8601DateTime object is a human-readable string in ISO8601 format.
So if you want to output it either for viewing or persisting, just call the :code:`value()` method. If nginx and http had spoken Object language,
methods wouldn't have been needed for that purpose.