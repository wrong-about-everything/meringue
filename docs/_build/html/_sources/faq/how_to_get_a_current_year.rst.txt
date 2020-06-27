How to get a current year
============================

As usual, if a current year is what you need, chances are there should be an entity in code which represents exactly this abstraction.
Look for an interface or abstract class called :code:`Year`, is there any? In meringue, there is one.

There are currently two ways you can get a year: from some datetime and from integer.
Hence, two classes: :code:`FromISO8601DateTime` and :code:`FromInt`.
If you're up to find a current year, I believe you could already know what to do: pass a current datetime to :code:`FromISO8601DateTime`:

.. code-block:: php

   (new FromISO8601DateTime(
       new Now()
   ))
       ->value();

If you want to get a year from some datetime, you can do the following:

.. code-block:: php

    (new FromISO8601DateTime(
        new FromISO8601('2020-02-11 15:21:47+03')
    ))
        ->value(); // returns 2020

It find a current year in local timezone, not UTC. For example, the output in the following case would be 2020 already:

.. code-block:: php

    (new FromISO8601DateTime(
        new FromISO8601('2020-01-01 00:01:47+03')
    ))
        ->value();

If you want to obtain a year in some other timezone, you'd want to :doc:`adjust the time to that timezone <./how_to_convert_a_datetime_to_specific_timezone>` first,
and then construct a :code:`Year` object.