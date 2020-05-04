How to calculate a difference between to dates
===============================================

The question in the header implies that the question is formulated correctly. Instead of subtracting two dates, you want a difference.
Instead of focusing on how, you focus in what. Instead of posing a a problem in terms of implied solution, you pose a problem in terms of what you really need.
And that is a good thing indeed. It even has a name: `declarative programming <https://tylermcginnis.com/imperative-vs-declarative-programming/>`_. Sql is known for that, for example.
Another my `library for declarative validation <validol.readthedocs.io/>`_ takes exactly this approach.

Declarative code applied to oop takes roots in :doc:`metaphysics <../meringue_philosophy>`. You formulate **what**'s out there in your domain. You're not interested in how
it came to be, or how it will evolve. It doesn't really matter. There are only objects, their properties and relations with each other and natural kinds they belong to.

So, the difference between two datetimes is an interval. You can get it from a range of datetimes. Those sentences transfer directly to php code:

.. code-block:: php

   class FromRange extends WithFixedStartDateTime
   //

**What** is :code:`WithFixedStartDateTime`? Let's take a look at its declaration:

.. code-block:: php

   abstract class WithFixedStartDateTime implements ISO8601Interval

So, :code:`WithFixedStartDateTime` **is a** ISO8601 interval with the following property that I wanted to highlight: it has fixed start datetime.