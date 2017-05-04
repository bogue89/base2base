
Base2Base PHP Function
------------

`base2base` is a function I wrote for a CakePHP 3 model behavior that generate a non incremental string as primary key. But I find myself using it for more than that so I'm sharing it.

`base2base` function is an upgrade of the `base_convert()` php function, by extending the "between 2 and 36" base limit it has.
You can declare any base setting the values in the position you want.

Also fix the precision `base_convert()` warning with large numbers due to the internal double of float type used.

Look how easy it is to use:

    <?php
    /* Convert 5 into binary */
    import 'base2base.php';
    $output = base2base(5, "0123456789", "01");
   Output: `101`
   
   
	<?php
    /* Make a small date representation with letters */
    import 'base2base.php';
    $output = base2base("1756-01-27", "-0123456789");
    
   Output: `79XxH9`

    <?php
    /* Create a password with specific charset using time as the base */
    import 'base2base.php';
    $password = base2base(time(), "0123456789", "abcdef0123456789");
   Output: `*******`


Features
--------

- Rearrange the bases to hide the incremental
- Pass data in smaller chars representations of values
- Use only the chars you need (very useful for urls)
- Make things your way

Installation
------------

Install $project by running:

    <?php
	import 'base2base.php';

Contribute
----------

- Issue Tracker: https://github.com/bogue89/base2base/issues
- Source Code: https://github.com/bogue89/base2base

Support
-------

If you are having issues or doubts, please let me know.

License
-------
The project is licensed under the MIT license.