<div class="se-nav-tab help-page <?php echo $active_tab == 'help' ? 'se-nav-tab-active' : ''; ?>">
        
    	<table class="form-table">
    		<tbody>
		    	<tr>
					<th colspan="2">
						<h2><?php _e('How to use',EVNT_TEXTDOMAIN);?></h2>
						<h4><?php _e('Please add this shortcode per page one.',EVNT_TEXTDOMAIN);?></h4>
					</th>
                </tr>
                
                <tr>
					<th><code>[events age=all]</code></th>
					<td>Display all <i>upcoming and past </i> events </td>
				</tr>
				<tr>
					<th><code>[events]</code></th>
					<td>Display all <i>upcoming</i> events.</td>
				</tr>
				<tr>
					<th><code>[events age=expired]</code></th>
					<td>Display all <i>past</i> events </td>
				</tr>
				<tr>
					<th><code>[events limit=3]</code></th>
					<td>Display the <i>next 3</i> events ordered by date, showing the soonest event first.</td>
				</tr>

			</tbody>
		</table>
	</div>