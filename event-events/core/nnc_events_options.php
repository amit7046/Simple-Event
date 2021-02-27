<?php
function EVNT_events_options() {
	global $wpdb;						
	$table_name = $wpdb->prefix . "EVNT_events";

	if (!current_user_can(get_option('EVNT_author')))  {
		wp_die( __('You do not have sufficient permissions to manage events.',EVNT_TEXTDOMAIN) );
	} // end check authorisation level of the user logged in


// Delete event button
if(isset($_POST['SEsettingsUpdate'])) {
	echo '<div id="message" class="updated fade"><p>'.__('The settings have been saved!',EVNT_TEXTDOMAIN).'</p></div>';
}

if(isset($_POST['delete'])) {
	   $remove_event = $_POST['event_id'];
	   $wpdb->query(" DELETE FROM $table_name WHERE id = $remove_event ");
	   $result = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $remove_event" );
	   if(!$result) {
			echo '<div id="message" class="updated fade"><p>'.__('The event has been deleted!',EVNT_TEXTDOMAIN).'</p></div>';
		}
}

if(isset($_POST['store_event'])) {
	if($_POST['event']['event_title']) { // New entries at least have to have a title, if none then nothing is written to DB
		$event = $_POST['event'];
		$event_start = mktime($event['event_start_hr'],$event['event_start_mn'],0,$event['event_start_month'],$event['event_start_day'],$event['event_start_yr']);
		$event_end = mktime($event['event_end_hr'],$event['event_end_mn'],0,$event['event_end_month'],$event['event_end_day'],$event['event_end_yr']);
		$newEvent['event_start'] = $event_start;
		$newEvent['event_end'] = $event_end;
		$newEvent['event_title'] = $event['event_title'];
		$newEvent['event_desc'] = $event['event_desc'];
		$newEvent['event_url'] = str_replace(" ", "", $event['event_url']);
		$newEvent['event_loc'] = $event['event_loc'];
		$newEvent['event_loc_url'] = str_replace(" ", "", $event['event_loc_url']);
		
		$wpdb->insert( $table_name, $newEvent );
		$result = $wpdb->insert_id;
		if(!$result) {
			echo '<div id="message" class="error fade"><p>'.__('Unfortunately something went wrong...',EVNT_TEXTDOMAIN).'</p></div>';
		} else { echo '<div id="message" class="updated fade"><p>'.__('The event was successfully added! Use the shortcode <code>[events]</code> to display the events. Check the <a href="?page=event-events&tab=help">Help</a> tab below for more advanced options.',EVNT_TEXTDOMAIN).'</p></div>'; }
		// End check  if entry was written successfully to the DB 
	} else { // So if no title was entered for the event then:
		echo '<div id="message" class="error fade"><p>'.__('Please enter the event title',EVNT_TEXTDOMAIN).'</p></div>';
	} // End check if title was entered or not and if so, the event was written to the DB
} // END check if event was saved 

elseif(isset($_POST['update_event'])) {
	global $wpdb;						
	$table_name = $wpdb->prefix . "EVNT_events";
	$event = $_POST['event'];
	$event_start = mktime($event['event_start_hr'],$event['event_start_mn'],0,$event['event_start_month'],$event['event_start_day'],$event['event_start_yr']);
	$event_end = mktime($event['event_end_hr'],$event['event_end_mn'],0,$event['event_end_month'],$event['event_end_day'],$event['event_end_yr']);
	$editEvent['event_start'] = $event_start;
	$editEvent['event_end'] = $event_end;
	$editEvent['event_title'] = $event['event_title'];
	$editEvent['event_desc'] = $event['event_desc'];
	$editEvent['event_url'] = str_replace(" ", "", $event['event_url']);
	$editEvent['event_loc'] = $event['event_loc'];
	$editEvent['event_loc_url'] = str_replace(" ", "", $event['event_loc_url']);
	
	$where['id'] = $_POST['eventid'];
	
	$result = $wpdb->update( $table_name, $editEvent, $where );
	if($result !== false) {
		echo '<div id="message" class="updated fade"><p>'.__('The event was succesfully updated!',EVNT_TEXTDOMAIN).'</p></div>';
	} else {
		echo '<div id="message" class="error fade"><p>'.__('There was a problem updating your event!',EVNT_TEXTDOMAIN).'</p></div>';
	}
} // END check if event was updated ?>

<div class="wrap">
	<h1>NNC Events</h1>

<?php 
if( isset( $_GET[ 'tab' ] ) ) {
    $active_tab = $_GET[ 'tab' ];
} else {
	$active_tab = "existing_events";
} // end if ?>

<h2 class="nav-tab-wrapper">
    <a href="?page=event-events&tab=existing_events" class="nav-tab <?php echo $active_tab == 'existing_events' ? 'nav-tab-active' : ''; ?>"><?php _e('All events',EVNT_TEXTDOMAIN);?></a>
    <a href="?page=event-events&tab=new_events" class="nav-tab <?php echo $active_tab == 'new_events' ? 'nav-tab-active' : ''; ?>"><?php _e('Add event',EVNT_TEXTDOMAIN);?></a>
    <a href="?page=event-events&tab=help" class="nav-tab <?php echo $active_tab == 'help' ? 'nav-tab-active' : ''; ?>"><?php _e('Help',EVNT_TEXTDOMAIN);?></a>
</h2>


    <?php 
	include('add-event.php'); 
	include('stored-events.php'); 
	include('help-events.php'); 
	
	?>
	
 <!-- END existing-page -->
	
</div>

<?php } // End of EVNT_events_options function 