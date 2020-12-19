<div class="se-nav-tab new-page <?php echo $active_tab == 'new_events' ? 'se-nav-tab-active' : ''; ?>">
        <form method="post">
			<?php
				$year = date('Y');
				$month = date('n');
				$day = date('j');
				$start_timeH = date('G');
				if(date('i') > 37) {
					$start_timeM = '45';
				} elseif(date('i') > 20) {
					$start_timeM = '30';
				} elseif(date('i') > 5) {
					$start_timeM = '15';
				} else {
					$start_timeM = '0';
				}
				$end_year = (date('Y',mktime(date('G')+1)));
				$end_month = (date('n',mktime(date('G')+1)));
				$end_day = (date('j',mktime(date('G')+1)));
				$end_timeH = (date('G',mktime(date('G')+1)));
			?>
	    	<table class="form-table">
	    		<tbody>
			    	<tr>
						<th colspan="2">
							<h2><?php _e('Add new event',NNC_TEXTDOMAIN);?></h2>
						</th>
					</tr>


                    <tr>
				        <th class="NNC_entry_title"><?php _e('Title:',NNC_TEXTDOMAIN);?></th>
				        <td> 
				        	<input name="event[event_title]" size="80" type="text" />
				        </td>
                    </tr>
                    <tr>
				        <th class="NNC_entry_description"><?php _e('Description:',NNC_TEXTDOMAIN);?></th>
				        <td> 
				            <textarea class="textarea1" cols="51" rows="5" name="event[event_desc]"></textarea>
				        </td>
			        </tr>
			    	<tr>
				        <th class="NNC_entry_start"><?php _e('Start:',NNC_TEXTDOMAIN);?></th>
				        <td>
					        <select name="event[event_start_day]">
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
									if($month != $i) echo '<option value="' . $i . '">' . date('F', mktime(0,0,0, $i, 1, date('Y') )) . '</options>'; else echo '<option selected value="' . $i . '">' . date('F', mktime(0,0,0, $i, 1, date('Y') )) . '</options>';
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
				        <th class="NNC_entry_start"><?php _e('End:',NNC_TEXTDOMAIN);?></th>
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
			        
			        <tr>
				        <th class="NNC_entry_loc"><?php _e('Location:',NNC_TEXTDOMAIN);?></th>
				        <td> 
				        	<input name="event[event_loc]" size="80" type="text" />
				        </td>
			        </tr>
			        <tr>
				        <th class="NNC_entry_loc_url"><?php _e('Location URL:',NNC_TEXTDOMAIN);?></th>
				        <td> 
				        	<input name="event[event_loc_url]" size="80" type="text" />
				        </td>
			        </tr>
			        <tr>
			        	<th>
			            </th>
			            <td>
			            	<p class="submit">
			            	<input name="store_event" type="submit" value="<?php _e('Save event',NNC_TEXTDOMAIN)?>" class="button-primary" />    
							<input type="hidden" name="action" value="save" />
			                </p>
			            </td>
			        </tr>
			    </tbody>
	    	</table>
	    </form>
    </div> <!-- END se-nav-tab new-page -->
    <?php 
//     add_action( 'wp_ajax_file_upload', 'file_upload_callback' );
//     add_action( 'wp_ajax_nopriv_file_upload', 'file_upload_callback' );
//     function file_upload_callback() {
//         $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
//      if (in_array($_FILES['file']['type'], $arr_img_ext)) {
//          $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
//          //$upload['url'] will gives you uploaded file path
//      }
//      wp_die();
//  }
    ?>