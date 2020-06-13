How to convert a datetime to specific timezone
==============================================

What is a timezone?
---------------------
It's 17:05 right now, as I'm writing this sentence, here in Moscow. At the very same moment, it's 15:05 in London: it's located to the west from Moscow.
There is an official explanation for that: we're in different timezones. Timezone is a specific region in the globe that has the same time. Most of them have a single offset
relative to a certain timezone with zero offset called UTC.

`Here is a full list of all timezones <https://en.wikipedia.org/wiki/List_of_time_zone_abbreviations>`_ with their offsets.

What is a daylight saving time?
--------------------------------
When I was studying at school, some peculiar events of specific sort usually happened twice a year. The first happened in the end of March,
when Moscow switched to summer time. With the intent to make daylight last longer in the evening, we turned clocks one hour forward. So what was 9 pm in the middle of March,
became 10 pm couple of weeks later; thus, it was more light at 9 pm. That period is called daylight saving time.

In autumn it was quite the opposite. The intent was to make mornings lighter, so we turned clocks one hour backwards. If you look out of a window in the middle of October in Moscow at about 6 am, it will be dark.
At 7am it's more or less fine. So why not turning 6 am to 5 am? That's exactly what we did for years, at the last Sunday of October. So 6 am becomes what recently was 7 am.

Timezones in PHP
--------------------
All good and fine, but it's a source of confusion for most of developers. In Russia, we quit using daylight saving time back in 2014. But in some parts of the World, it's still there.

Luckily, php has our back. For example, if you live in London, you don't have to calculate when you switch to DST every year.
You can use Europe/London timezone instead, and daylight saving time is taken care of automatically. That information is distributed within PHP.
`Here is an entire list <https://www.php.net/manual/en/timezones.php>`_. Find a city from this list that has the same timezone and use it explicitly in your project.
That's just more convenient way to work with timezones, instead of specifying manually the offset.

If your government decides to change your timezone rules, the PHP may not have time to catch up. In this case, you can `upgrade timezone database via PECL <https://pecl.php.net/package/timezonedb>`_.

How to deal with timezones in php
-------------------------------------
Here is how you can adjust your datetime according to specific timezone:

.. code-block:: php

   (new AdjustedAccordingToTimeZone(
       new FromISO8601('2018-04-25 15:08:01+03:00'),
       new CET()
   ))
       ->value();

You can find some more about an overall approach used in meringue in a .:doc:`quick start entry <../quick_start>`.