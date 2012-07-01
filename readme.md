# Google Analytics for WordPress #

This plugin provides a very bare-bones implementation of Google Analytics'
tracking code.  Yes, there are a number of other good plugins out there for
adding Google Analytics to your site.  This one is extremely minimal, with no
extra frills.

## Configuration ##

The plugin provides no UI for configuring it.  Instead, you must defined a PHP
constant named `GOOGLE_ANALYTICS_ID`.  This is most easily done by adding a
snippet like the following to your wp-config.php file:

    define('GOOGLE_ANALYTICS_ID', 'UA-XXXXXX-X');

## Questions ##

**Does this plugin track logged-in users?**

Out of the box, it will not track logged in administrators.  All other
visitors, logged in are not, are tracked.  You can override this behavior using
the `analytics_track_user` filter.

**Can I include custom Google Analytics code**

Yes, an action named `analytics_tracking_js` is called after setting up the
`_gaq` var, but before including the `ga.js` script.
