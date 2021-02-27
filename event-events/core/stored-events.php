
<!-- Displaying the stored events: -->
<div class="se-nav-tab existing-page <?php echo $active_tab == 'existing_events' ? 'se-nav-tab-active' : ''; ?>">

	<?php if(isset($_POST['edit'])) { 

	global $wpdb;
	$table_name = $wpdb->prefix . "EVNT_events";
	$edit_event = $_POST['event_id'];
	$update = $wpdb->get_results(" SELECT * FROM $table_name WHERE id = $edit_event ", "ARRAY_A");
	?>


	<?php
	$year = date('Y',$update[0]['event_start']);
	$month = date('n',$update[0]['event_start']);
	$day = date('j',$update[0]['event_start']);
	$start_timeH = date('G',$update[0]['event_start']);
	$start_timeM = date('i',$update[0]['event_start']);
	$end_year = date('Y',$update[0]['event_end']);
	$end_month = date('n',$update[0]['event_end']);
	$end_day = date('j',$update[0]['event_end']);
	$end_timeH = date('G',$update[0]['event_end']);
	$end_timeM = date('i',$update[0]['event_end']);
	?>

	<form method="post">
	    <table class="form-table">
	    	<tbody>
		    	<tr>
					<th colspan="2">
						<h2><?php _e('Edit event:',EVNT_TEXTDOMAIN);?></h2>
					</th>
				</tr>
	    

		    	<tr>
			        <th class="EVNT_entry_start"><?php _e('Start:',EVNT_TEXTDOMAIN);?></th>
			        <td>
				        <select name="event[event_start_day]"> <!-- ## EVENT START DAY ## -->
							<?php $i = 0;
							while($i < 31) {
								$i++;
								if($day != $i) echo '<option value="' . $i . '">' . $i . '</options>'; else echo '<option selected value="' . $i . '">' . $i . '</options>';
							} ?>
				        </select>
				        <select name="event[event_start_month]"> <!-- ## EVENT START MONTH ## -->
							<?php $i = 0;
							while($i < 12) {
								$i++;
								if($month != $i) echo '<option value="' . $i . '">' . date('F', mktime(0,0,0, $i, 1, date('Y'))) . '</options>'; else echo '<option selected value="' . $i . '">' . date('F', mktime(0,0,0, $i, 1, date('Y') )) . '</options>';
							} ?>
				        </select>
				        <select name="event[event_start_yr]"> <!-- ## EVENT START YEAR ## -->
							<?php $i = 1979;
							while($i < 2040) {
								$i++;
								if($year != $i) echo '<option value="' . $i . '">' . $i . '</options>'; else echo '<option selected value="' . $i . '">' . $i . '</options>';
							} ?>
				        </select> - 
				        <select name="event[event_start_hr]"> <!-- ## EVENT START HOUR ## -->
							<?php $i = 0;
							while($i < 24) {
								if($start_timeH != $i) echo '<option value="' . $i . '">' . date('H', mktime( $i ,0,0,0 )) . '</options>'; else echo '<option selected value="' . $i . '">' . date('H', mktime( $i ,0,0,0 )) . '</options>';	
								$i++;
							} ?>
				        </select>&nbsp;:&nbsp;<select name="event[event_start_mn]">
				        	<option <?php if($start_timeM == 0) echo "selected";?> value="0">00</option>
				        	<option <?php if($start_timeM == 5) echo "selected";?> value="5">05</option>
				        	<option <?php if($start_timeM == 10) echo "selected";?> value="10">10</option>
				        	<option <?php if($start_timeM == 15) echo "selected"; ?> value="15">15</option>
				        	<option <?php if($start_timeM == 20) echo "selected";?> value="20">20</option>
				        	<option <?php if($start_timeM == 25) echo "selected";?> value="25">25</option>
				        	<option <?php if($start_timeM == 30) echo "selected";?> value="30">30</option>
				        	<option <?php if($start_timeM == 35) echo "selected"; ?> value="35">35</option>
				        	<option <?php if($start_timeM == 40) echo "selected";?> value="40">40</option>
				        	<option <?php if($start_timeM == 45) echo "selected";?> value="45">45</option>
				        	<option <?php if($start_timeM == 50) echo "selected";?> value="50">50</option>
				        	<option <?php if($start_timeM == 55) echo "selected"; ?> value="55">55</option>
				        </select>
			        </td>
		        </tr>
		        
		        <tr>
			        <th class="EVNT_entry_start"><?php _e('End:',EVNT_TEXTDOMAIN);?></th>
			        <td>
				        <select name="event[event_end_day]"> <!-- ## EVENT END DAY ## -->
							<?php $i = 0;
							while($i < 31) {
								$i++;
								if($end_day != $i) echo '<option value="' . $i . '">' . $i . '</options>'; else echo '<option selected value="' . $i . '">' . $i . '</options>';
							} ?>
				        </select>
				        <select name="event[event_end_month]"> <!-- ## EVENT END MONTH ## -->
							<?php $i = 0;
							while($i < 12) {
								$i++;
								if($end_month != $i) echo '<option value="' . $i . '">' . date('F', mktime(0,0,0, $i, 1, date('Y') )) . '</options>'; else echo '<option selected value="' . $i . '">' . date('F', mktime(0,0,0, $i, 1, date('Y') )) . '</options>';
							} ?>
				        </select>
				        <select name="event[event_end_yr]"> <!-- ## EVENT END YEAR ## -->
							<?php $i = 1979;
							while($i < 2040) {
								$i++;
								if($end_year != $i) echo '<option value="' . $i . '">' . $i . '</options>'; else echo '<option selected value="' . $i . '">' . $i . '</options>';
							} ?>
				        </select> - 
				        <select name="event[event_end_hr]"> <!-- ## EVENT END HOUR ## -->
							<?php $i = 0;
							while($i < 24) {
								if($end_timeH != $i) echo '<option value="' . $i . '">' . date('H', mktime( $i ,0,0,0 )) . '</options>'; else echo '<option selected value="' . $i . '">' . date('H', mktime( $i ,0,0,0 )) . '</options>';	
								$i++;
							} ?>
				        </select>&nbsp;:&nbsp;<select name="event[event_end_mn]">
				        	<option <?php if($end_timeM == 0) echo "selected";?> value="0">00</option>
				        	<option <?php if($end_timeM == 5) echo "selected";?> value="5">05</option>
				        	<option <?php if($end_timeM == 10) echo "selected";?> value="10">10</option>
				        	<option <?php if($end_timeM == 15) echo "selected"; ?> value="15">15</option>
				        	<option <?php if($end_timeM == 20) echo "selected";?> value="20">20</option>
				        	<option <?php if($end_timeM == 25) echo "selected";?> value="25">25</option>
				        	<option <?php if($end_timeM == 30) echo "selected";?> value="30">30</option>
				        	<option <?php if($end_timeM == 35) echo "selected"; ?> value="35">35</option>
				        	<option <?php if($end_timeM == 40) echo "selected";?> value="40">40</option>
				        	<option <?php if($end_timeM == 45) echo "selected";?> value="45">45</option>
				        	<option <?php if($end_timeM == 50) echo "selected";?> value="50">50</option>
				        	<option <?php if($end_timeM == 55) echo "selected"; ?> value="55">55</option>
				        </select>  
			        </td>
		        </tr>
	        
		        <tr>
			        <th class="EVNT_entry_title"><?php _e('Title:',EVNT_TEXTDOMAIN);?></th>
			        <td> 
			        	<input name="event[event_title]" size="80" type="text" value="<?php echo $update[0]['event_title'];?>" />
			        </td>
		        </tr>
		        <tr>
			        <th class="EVNT_entry_description"><?php _e('Description:',EVNT_TEXTDOMAIN);?></th>
			        <td>  
			        	
			            <textarea class="textarea1" cols="51" rows="5" name="event[event_desc]"><?php echo stripslashes($update[0]['event_desc']);?></textarea>
			        </td>
		        </tr>
		     
		        <tr>
			        <th class="EVNT_entry_url"><?php _e('Event URL:',EVNT_TEXTDOMAIN);?></th>
			        <td>
			        	<input name="event[event_url]" size="80" type="text" value="<?php echo $update[0]['event_url'];?>" />
			        </td>
		        </tr>
		        <tr>
		        	<th class="EVNT_entry_loc"><?php _e('Location:',EVNT_TEXTDOMAIN);?></th>
			        <td> 
			        	<input name="event[event_loc]" size="80" type="text" value="<?php echo $update[0]['event_loc'];?>" />
			        </td>
		        </tr>
		        <tr>
		        	<th class="EVNT_entry_loc_url"><?php _e('Location URL:',EVNT_TEXTDOMAIN);?></th>
			        <td> 
			        	<input name="event[event_loc_url]" size="80" type="text" value="<?php echo $update[0]['event_loc_url'];?>" />
			        </td>
	        	</tr>
		        <tr>
		        	<th>
		            </th>
		            <td>
		            	<p class="submit">
		                <input type="hidden" name="eventid" value="<?php echo $edit_event;?>" />
		            	<input name="update_event" type="submit" value="<?php _e('Update event',EVNT_TEXTDOMAIN)?>" class="button-primary" />    
						<input type="hidden" name="action" value="save" />
						<a href="?page=event-events&tab=existing_events" class="button-secondary">Cancel</a>
		                </p>
		            </td>
		        </tr>
	    
	    	</tbody>
	    </table>
	</form>
	<?php } ?>

<?php

global $wpdb;
$table_name = $wpdb->prefix . "EVNT_events";
$myevents = $wpdb->get_results(" SELECT * FROM $table_name ORDER BY event_start ", "ARRAY_A");
if(count($myevents) > 0) {

	// Display all events currently stored in the database
	setlocale(LC_ALL, get_locale());
?>

<table class="form-table">
	<tbody>
		<tr>
			<th colspan="2">
				<h2><?php _e('Upcoming events',EVNT_TEXTDOMAIN);?></h2>
			</th>
		</tr>
	</tbody>
</table>

<table cellspacing="5" width="100%">
	<tbody>
	<?php
	$i = 0;
	foreach($myevents as $details) { 
		if ($details['event_end'] > time()) { 
			++$i; ?>
    	
        <tr>
        <th class="eventtitle" colspan="3">
        	<form method="post" style="float: right;">
        		<input type="hidden" name="event_id" value="<?php echo $details['id'];?>" />
        		
        		<button class="se-button" type="submit" name="edit" value="<?php _e('Edit',EVNT_TEXTDOMAIN);?>"><span class="dashicons dashicons-edit"></span></button>
        		<button class="se-button" type="submit" name="delete" value="<?php _e('Remove',EVNT_TEXTDOMAIN);?>"><span class="dashicons dashicons-trash"></span></button>
        	</form> <?php echo stripslashes($details['event_title']);?></th>
        </tr>
        <tr>
        <td class="eventdescription" colspan="3"><?php echo stripslashes(nl2br($details['event_desc']));?></td>
        </tr>
        <tr>
        <td class="eventstart" width="33%"><?php echo strftime(DATE ." ". YEAR, $details['event_start']);?><br /><?php echo strftime(TIME, $details['event_start']);?></td>
        <td class="eventend" width="33%"><?php echo strftime(DATE ." ". YEAR, $details['event_end']);?><br /><?php echo strftime(TIME, $details['event_end']);?></td>
        <td></td>
        </tr>
        <tr>
        <td class="eventlocation">
			<?php if($details['event_loc'] != "" && $details['event_loc_url'] != "") {
				echo '<span class="dashicons dashicons-location"></span> <a class="eventlinks" href="'.httpprefix($details['event_loc_url']).'" target="_blank">'.$details['event_loc'].'</a>'; 
			} elseif($details['event_loc'] != "" ) {
				echo '<span class="dashicons dashicons-location"></span> '.$details['event_loc'];
			} elseif($details['event_loc_url'] != "" ) {
				echo '<span class="dashicons dashicons-location"></span> <a class="eventlinks" href="'.httpprefix($details['event_loc_url']).'">'.shortenstring(httpprefix($details['event_loc_url']),30).'</a>'; 				
			} else {
				echo '<span class="dashicons dashicons-location"></span>';
			}
			
			
			?></td>
          
            <td>
			<?php if($details['event_url'] != "") {
				echo '<span class="dashicons dashicons-admin-links"></span> <a class="eventlinks" href="'.httpprefix($details['event_url']).'" target="_blank">'.shortenstring(httpprefix($details['event_url']),30).'</a>';
			} else {
				echo '<span class="dashicons dashicons-admin-links"></span>';
			} ?>
            </td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
<?php } // end foreach stored events display table
} ?>
	</tbody>
</table>
	<?php if($i < 1) { ?> 
		<p class="se-empty-list">You currently have no upcoming events. 
			<a href="?page=event-events&tab=new_events" class="button-primary"><?php _e('Add event',EVNT_TEXTDOMAIN);?></a>
		</p>
	<?php } ?>

<table class="form-table">
	<tbody>
		<tr>
			<th colspan="2">
				<h2><?php _e('Past events',EVNT_TEXTDOMAIN);?></h2>
			</th>
		</tr>
	</tbody>
</table>

<table cellspacing="5" width="100%">
	<tbody>
		<?php 
		$i = 0;
		foreach($myevents as $details) { 
			if ($details['event_end'] < time()) { 
				++$i; ?>
        <tr>
        <th class="eventtitle" colspan="3">
        	<form method="post" style="float: right;">
        		<input type="hidden" name="event_id" value="<?php echo $details['id'];?>" />
        		
        		<button class="se-button" type="submit" name="edit" value="<?php _e('Edit',EVNT_TEXTDOMAIN);?>"><span class="dashicons dashicons-edit"></span></button>
        		<button class="se-button" type="submit" name="delete" value="<?php _e('Remove',EVNT_TEXTDOMAIN);?>"><span class="dashicons dashicons-trash"></span></button>
        	</form> <?php echo stripslashes($details['event_title']);?></th>
        </tr>
        <tr>
        <td class="eventdescription" colspan="3"><?php echo stripslashes(nl2br($details['event_desc']));?></td>
        </tr>
        <tr>
        <td class="eventstart" width="33%"><?php echo strftime(DATE ." ". YEAR, $details['event_start']);?><br /><?php echo strftime(TIME, $details['event_start']);?></td>
        <td class="eventend" width="33%"><?php echo strftime(DATE ." ". YEAR, $details['event_end']);?><br /><?php echo strftime(TIME, $details['event_end']);?></td>
        <td></td>
        </tr>
        <tr>
        <td class="eventlocation">
			<?php if($details['event_loc'] != "" && $details['event_loc_url'] != "") {
				echo '<span class="dashicons dashicons-location"></span> <a class="eventlinks" href="'.httpprefix($details['event_loc_url']).'" target="_blank">'.$details['event_loc'].'</a>'; 
			} elseif($details['event_loc'] != "" ) {
				echo '<span class="dashicons dashicons-location"></span> '.$details['event_loc'];
			} elseif($details['event_loc_url'] != "" ) {
				echo '<span class="dashicons dashicons-location"></span> <a class="eventlinks" href="'.httpprefix($details['event_loc_url']).'">'.shortenstring(httpprefix($details['event_loc_url']),30).'</a>'; 				
			} else {
				echo '<span class="dashicons dashicons-location"></span>';
			}
			
			
			?></td>
           
            <td>
			<?php if($details['event_url'] != "") {
				echo '<span class="dashicons dashicons-admin-links"></span> <a class="eventlinks" href="'.httpprefix($details['event_url']).'" target="_blank">'.shortenstring(httpprefix($details['event_url']),30).'</a>';
			} else {
				echo '<span class="dashicons dashicons-admin-links"></span>';
			} ?>
            </td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        
<?php }} // end foreach stored events display table ?>
	</tbody>
</table>

<?php if($i < 1) { ?>
	<p class="se-empty-list"><?php _e('Your past events list is empty.',EVNT_TEXTDOMAIN);?></p>
<?php }

// end check if anything was stored in the DB 
} else { ?>
	<table class="form-table">
		<tbody>
			<tr>
				<th colspan="2">
					<h2><?php _e('All events',EVNT_TEXTDOMAIN);?></h2>
				</th>
			</tr>
		</tbody>
	</table>
	<p class="se-empty-list se-center margin-bottom"><?php _e('You have no stored events.',EVNT_TEXTDOMAIN);?> <a href="?page=event-events&tab=new_events" class="button-primary"><?php _e('Add event',EVNT_TEXTDOMAIN);?></a></p><hr>
<?php } ?>
</div>