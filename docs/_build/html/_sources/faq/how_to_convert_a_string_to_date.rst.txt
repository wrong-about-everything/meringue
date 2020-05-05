How to convert a string to date
=================================

So, what you really need is an ISO8601 date. In other words, you need an ISO8601 object. Thus you need a class which creates
this object from string. That is a meringe way of thinking, reinforced by :doc:`metaphysics <../meringue_philosophy>`.

So if you have an ISO8601-compliant string, it's as simple as that:

.. code-block:: php

   $m = new FromISO8601('1986-05-04 00:30:00+03');

If you have a string in some arbitrary format, you can use :code:`FromCustomFormat` class. For example,

.. code-block:: php

   $customFormatDateTime = new FromCustomFormat('mY--d\T\T\!H:i:sO', '122018--31TT!23:12:59+0200');

   $this->assertTrue($customFormatDateTime->isValid());
   $this->assertEquals(
      '2018-12-31T23:12:59+02:00',
      $customFormatDateTime->value()
   );

As usual, checking out `tests <https://github.com/wrong-about-everything/meringue/tree/master/test>`_ is always a good idea.