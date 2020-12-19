<?php
/*
Plugin Name: NNC Event
Plugin URI: https://www.nncinfotech.com/
Description: This is the event create plugin.
Version: 1.0
Author: NNC infotech
Author URI: https://www.nncinfotech.com/
*/

define('NNC_VERSION', '1.0.0');
define('NNC_DOMAIN',get_bloginfo('url').'/wp-content/plugins/nnc-events/');
define('NNC_TEXTDOMAIN','nnc-events');
define('NNC_FOLDER', plugin_basename( dirname(__FILE__)) );
define('NNC_PLUGIN', WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));

include('core/date-time-yeae-event.php'); 

// Make plugin available for translation
function sec_init() {
	load_plugin_textdomain(NNC_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) );
}
add_action('plugins_loaded', 'sec_init');

// Setting the stylesheet:
if(isset($_REQUEST['page'])) {
	if($_REQUEST['page']=='nnc-events' || $_REQUEST['page']=='nnc-events-settings')  {
		add_action( 'admin_init', 'NNC_admin_head' );
		function NNC_admin_head() {
			wp_enqueue_style('se-styling', NNC_DOMAIN .'style.css', false, NNC_VERSION, "all");
		}
	}
}

include('core/db-table.php'); 

register_activation_hook(__FILE__,'NNC_install');
   
function myplugin_update_db_check() {
	global $NNC_db_version;
	if (get_site_option('NNC_db_version') != $NNC_db_version) {
		NNC_install();
	}
}
add_action('plugins_loaded', 'myplugin_update_db_check');

// Set default settings
 if( !get_option('NNC_clock')) {
	$NNC_clock = "24";
	$NNC_ext_css = "no";
	$NNC_timezone = "+00:00";
	$NNC_author = "manage_options";
	$NNC_links = "none";
	add_option("NNC_clock", $NNC_clock);
	add_option("NNC_ext_css", $NNC_ext_css);
	add_option("NNC_timezone", $NNC_timezone);
	add_option("NNC_author", $NNC_author);
	add_option("NNC_links", $NNC_links);
}

// Create the admin menu
add_action('admin_menu', 'NNC_menu');

function NNC_menu() {
	add_menu_page('NNC Events', 'Events', get_option('NNC_author'), 'nnc-events', 'nnc_events_options','dashicons-calendar-alt');
}// End function NNC_menu to add a button to the admin dashboard


include('core/nnc_events_options.php'); 

include('core/shortcode-events.php'); 

function sec_head() {
	global $sec_options;
	echo "\n<!-- NNC Events".NNC_VERSION." by Amit. -->";
	echo "\n<link rel=\"profile\" href=\"http://microformats.org/profile/hcalendar\" />\n\n";
}
add_action('wp_head', 'sec_head');
