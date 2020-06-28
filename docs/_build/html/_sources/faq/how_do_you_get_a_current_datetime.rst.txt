How do you get a current datetime
====================================

Following :doc:`meringue philosophy <../meringue_philosophy>`, it's a piece of cake. Just ask the following question: **what** do I need?
You need a current datetime, that is, now. Here goes the object -- :code:`$currentDatetime = new Now();`.

You can work with this datetime further: you can get datetimes :doc:`in the future <how_to_add_seconds_minutes_hours_days_and_all_to_php_datetime>`
or :doc:`in the past <how_to_subtract_seconds_minutes_hours_days_and_all_from_a_given_datetime>`,
or :doc:`format it to your taste <how_to_format_a_php_date>`.

Often times, you want to know what time it is in some other timezone. For example, it's 15:08 in Moscow, and you want to know what time it is in Central Europe.
In other words, you want to know specific point in time adjusted according to some other timezone, in our case it could be Berlin, Paris or Rome.
Hence the class: :code:`AdjustedAccordingToTimeZone`. So here is how you can convert a datetime to another timezone:

.. code-block:: php

    (new AdjustedAccordingToTimeZone(
        new FromISO8601('2018-04-25 15:08:01+03:00'),
        new CET()
    ))
        ->value()

Currently there are a few of `built-in meringue timezones <https://github.com/wrong-about-everything/meringue/tree/master/src/ISO8601DateTime/TimeZone>`_, feel free to add yours.