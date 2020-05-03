Quick start
=====================

If you haven't yet read :doc:`meringue philosophy <meringue_philosophy>` entry, now is a good time to do it.

Short recap
+++++++++++++
There is a small set of basic abstractions, and quite a few of their implementations. It's like Lego bricks.
There are plenty of them, but few of their forms. An amount of possible combinations explodes combinatorially.
You can create as complex objects as you need, but you don't lose grip of your code entities -- they stay small and simple.

Any class represents a specific implementation of a kind denoted by an interface (:doc:`meringue philosophy <meringue_philosophy>`, again).
So any class' declaration, like :code:`class SomeSpecificImplementation implements Concept` is read like "`Some specific implementation` is a `concept`".
In other words, a class *falls under* a category represented by an interface. What is this specific red and sweet thing right in front of me? It's an apple.
What is that green and sour thing on the table? That's an apple either. Both are apples, but the former is red and sweet, and the latter and green and sour.
They have the same essential properties, ones that make them both apples, but their accidental properties vary.
So, you just need to find abstractions that work for your domain.

Just focus on **what** you need as a result, instead of **how** you want to get there.

Creating datetimes
++++++++++++++++++++
So, what do you want? Say, you want to output a current datetime. So, current datetime is what you need. There is a class that represents current datetime: it's called :code:`Now`.

Or, say you want to add a few seconds, minutes, hours, days, or months, or years. In fact, what you need is some datetime in the future. It's some interval away from your given datetime.
It doesn't matter how to get there, the only thing that matters is what you need, not how -- remember?
So that's how it looks in meringue:

.. code-block:: php

   $f = new Future(new Now(), new NHours(2));

The code above creates an object which *is* a datetime, namely a datetime 2 hours later from now.

Or, you might want to create an arbitrary datetime. If you have an ISO8601 string, you can do it with :code:`new FromISO8601($yourString)`.
The name of this class is read like `an object is created from an ISO8601 string`.

In the same vein, you can create a past some time earlier. This could look like

.. code-block:: php

   $f =
      new Past(
         new FromISO8601('2020-04-05 12:26:04+03'),
         new NHours(2)
      );

It's possible to create any datetime in the past or future with any custom intervals as well.

Creating intervals
++++++++++++++++++++
Meringue intervals go in two flavors. The first one is a floating interval not tied to any specific start date, and the second one is with fixed start datetime.
Hence the names: :code:`Floating` and :code:`WithFixedStartDateTime`.

Floating interval should be used when you don't care when it starts. How long does it take to cook a cake? It takes two hours. No matter when you start, it's just two hours.
There are classes representing intervals used most often: one second, *n* seconds, one minute, *n* minutes, and so on.
Besides, you can use ISO8601 format for intervals. It starts with *P*, then amount of years followed with *Y*, amount of months followed with *M*, then date, indicated with *M*.
After that, *T* separator marking the beginning of time notation. *H* is for hours, *M* for minutes, *S* for seconds. So a floating interval of one year, three days and seventy four seconds looks like that:

.. code-block:: php

   $f =
      new Future(
         new FromISO8601('2020-04-05 12:26:04+03'),
         new FromISO8601('P1YT3D74S')
      );

When a start date matters, the corresponding class is used. For example, how many days are in one month? It depends on the month, doesn't it?
So we can't answer this question having a floating interval. There are two way we can get it: from a start and finish datetime range, and from a start date and an interval.
Hence two classes: :code:`FromRange` and :code:`FromStartDateTimeAndInterval`.

Formatting datetimes
+++++++++++++++++++++
First, I was pondering about writing some custom code for handling that.
But I ended up with using a default `IntlDateFormatter class <https://www.php.net/manual/en/class.intldateformatter.php>`_ in my projects.
It represents an ICU initiative, combining internationalization and localization efforts. Most of the time, no extra layer of complexity is needed.

If you need some simple formatting or ISO8601 support, there are a few classes supporting that.

Formatting intervals
+++++++++++++++++++++++
Due to reasons outlined above, only intervals with fixed start date can be formatted.

Mainly, you need to express an interval in some units: seconds, minutes, etc. They can be rounded either up or down. There is a bunch of classes doing exactly that:
:code:`TotalCeiledDays` (rounded up, after a :code:`ceil` php function), :code:`TotalFullMinutes` (rounded down), etc.

If you need a human readable version, there is a :code:`HumanReadable` class. I doubt it suits your needs though; more often than not, all the formatting facilities are
unique to an application, and trying to stick it into a single library only makes things more complicated.

Schedule
++++++++++
Sometimes you need to represent a concept of a schedule, be it a grocery store, a restaurant, or your morning jogging.
More often than not, it depends on the week day. Here is how it looks in meringue:

.. code-block:: php

   $schedule =
      new ByWeekDays(
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(20, 30, 0)
         ),
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(20, 30, 0)
         ),
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(20, 30, 0)
         ),
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(20, 30, 0)
         ),
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(2, 0, 0)
         ),
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(23, 00, 0)
         ),
         new Daily(
            new DefaultTime(6, 0, 0),
            new DefaultTime(23, 0, 0)
         )
      );

If your restaurant or anything is open twenty four seven, there is a class for that -- :code:`TwentyFourSeven`.
If you want to take a state holidays into consideration, you can use :code:`Monthly`. It takes two parameters: the first one is a working schedule,
the second one is the schedule of holidays.