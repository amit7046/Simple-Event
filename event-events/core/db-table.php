<?php

// Creating the Table in the DB or updating the structure
global $EVNT_db_version;
$EVNT_db_version = "1.0.0";

function EVNT_install() {
	global $wpdb;
	global $EVNT_db_version;
	
	$table_name = $wpdb->prefix . "EVNT_events";
	  
	$sql = "CREATE TABLE $table_name (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	event_start INT(10) ZEROFILL NOT NULL,
	event_end INT(10) ZEROFILL NOT NULL,
	event_title TEXT NOT NULL,
	event_desc LONGTEXT NULL,
	event_url TEXT NULL,
	event_loc TEXT NOT NULL,
	event_loc_url TEXT NULL,
	UNIQUE KEY id (id)
	);";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	add_option("EVNT_db_version", $EVNT_db_version);
	
	global $wpdb;
	$installed_ver = get_option( "EVNT_db_version" );
	
	if( $installed_ver != $EVNT_db_version ) {	
		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		event_start INT(10) ZEROFILL NOT NULL,
		event_end INT(10) ZEROFILL NOT NULL,
		event_title TEXT NOT NULL,
		event_desc LONGTEXT NULL,
		event_url TEXT NULL,
		event_loc TEXT NOT NULL,
		event_loc_url TEXT NULL,
		UNIQUE KEY id (id)
		);";
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		
		update_option( "EVNT_db_version", $EVNT_db_version );
	}
} // End Create Table in DB function

?>