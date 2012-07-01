<?php
/*
Plugin Name: Google Analytics
Description: Minimal plugin for adding Google Analytics tracking code.
Author: Will Norris
Author URI: http://willnorris.com/
*/

/**
 * Insert javascript for Google Analytics.
 *
 * @uses apply_filters calls 'analytics_track_user' to determine if current 
 *       user should be tracked.
 * @uses do_actions calls 'analytics_tracking_js' before including ga.js script.
 */
function analytics_tracking_code() {
  if ( !defined('GOOGLE_ANALYTICS_ID') ) return;

  // don't track logged in administrators
  $track = ( is_user_logged_in() && current_user_can('manage_options') ) ? false : true;
  $track = apply_filters('analytics_track_user', $track);
  if ( !$track ) return;

?>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo GOOGLE_ANALYTICS_ID; ?>']);
<?php do_action('analytics_tracking_js'); ?>
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.async = true;
    ga.src = '//www.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php

}
add_action('wp_head', 'analytics_tracking_code', 99);

