How to get a month in a datetime in php
==========================================

Following meringue philosophy, the key is to know *what* you need. With this approach, you end up with objects having counterparts
in real life. Usually, the most simple way is to follow the language someone uses to describe a problem. Words refer to existing
objects, otherwise, those words wouldn't exist. So listen carefully to the words your domain expert uses.

In the domain of dates and times, it's all quite simple. If you hear "month", most probably you need a class whose objects are referred by this word.
Is it a single class or multiple classes? A "month" is a general term. There are a lot of things actually fall under this concept,
and they all have different properties. Month can be plainly May or June. Or it can be identified by an ISO8601 datetime.
Or by ordinal number. Thus, I've created a `Month` interface indicating this category.

One concrete implementation put in a title of this entry is characterized by the specific datetime. Say, you have an ISO8601
datetime, like 2020-07-20T10:45:21+03:00. And you want to obtain a month from it. the resulting object, falling under the "Month" category,
as a very specific property: it's obtained from, or identified by, a datetime. Hence the name: `FromISO8601DateTime`.

If you want to have a current month, you can pass a current datetime to it:

.. code-block:: php

   (new FromISO8601DateTime(
       new Now()
   ))
       ->value();

Similarly, if you want to create a month from any other datetime, it looks like the following:

.. code-block:: php

    (new FromISO8601DateTime(
        new FromISO8601('2020-02-11 15:21:47+03')
    ))
        ->value(); // returns 2

In the same vein, you can create a month object not with a datetime, but from its ordinal number:

.. code-block:: php

    (new FromInt(7))->value(); // no surprises, it's 7

Other datetime parts have pretty much the same functionality and approach.