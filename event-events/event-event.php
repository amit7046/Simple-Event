<?php
/*
Plugin Name: Event plugin
Plugin URI: https://github.com/amit7046/Simple-Event
Description: This is the event create plugin.
Version: 1.0
Author: Amit Dudhat
Author URI: https://github.com/amit7046/Simple-Event
*/

define('EVNT_VERSION', '1.0.0');
define('EVNT_DOMAIN',get_bloginfo('url').'/wp-content/plugins/event-events/');
define('EVNT_TEXTDOMAIN','event-events');
define('EVNT_FOLDER', plugin_basename( dirname(__FILE__)) );
define('EVNT_PLUGIN', WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));

include('core/date-time-yeae-event.php'); 

// Make plugin available for translation
function sec_init() {
	load_plugin_textdomain(EVNT_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) );
}
add_action('plugins_loaded', 'sec_init');

// Setting the stylesheet:
if(isset($_REQUEST['page'])) {
	if($_REQUEST['page']=='event-events' || $_REQUEST['page']=='event-events-settings')  {
		add_action( 'admin_init', 'EVNT_admin_head' );
		function EVNT_admin_head() {
			wp_enqueue_style('se-styling', EVNT_DOMAIN .'style.css', false, EVNT_VERSION, "all");
		}
	}
}

include('core/db-table.php'); 

register_activation_hook(__FILE__,'EVNT_install');
   
function myplugin_update_db_check() {
	global $EVNT_db_version;
	if (get_site_option('EVNT_db_version') != $EVNT_db_version) {
		EVNT_install();
	}
}
add_action('plugins_loaded', 'myplugin_update_db_check');

// Set default settings
 if( !get_option('EVNT_clock')) {
	$EVNT_clock = "24";
	$EVNT_ext_css = "no";
	$EVNT_timezone = "+00:00";
	$EVNT_author = "manage_options";
	$EVNT_links = "none";
	add_option("EVNT_clock", $EVNT_clock);
	add_option("EVNT_ext_css", $EVNT_ext_css);
	add_option("EVNT_timezone", $EVNT_timezone);
	add_option("EVNT_author", $EVNT_author);
	add_option("EVNT_links", $EVNT_links);
}

// Create the admin menu
add_action('admin_menu', 'EVNT_menu');

function EVNT_menu() {
	add_menu_page('NNC Events', 'Events', get_option('EVNT_author'), 'event-events', 'EVNT_events_options','dashicons-calendar-alt');
}// End function EVNT_menu to add a button to the admin dashboard


include('core/EVNT_events_options.php'); 

include('core/shortcode-events.php'); 

function sec_head() {
	global $sec_options;
	echo "\n<!-- NNC Events".EVNT_VERSION." by Amit. -->";
	echo "\n<link rel=\"profile\" href=\"http://microformats.org/profile/hcalendar\" />\n\n";
}
add_action('wp_head', 'sec_head');
