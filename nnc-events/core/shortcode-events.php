<?php
// Add the shortcode for displaying the event on pages
function displayevents( $atts ) {
	setlocale(LC_ALL, get_locale());
	
	// VARIATIONS: EXPIRED  /  ALL  /  UPCOMING
	isset($atts['age']) ? $age = $atts['age'] : $age = NULL;
	$range = age($age);
	
	// See if Label filter is used
	$label = NULL;
	if(isset($atts['label'])) $label = strtolower($atts['label']);
	
	// See if a limit has been set
	if( isset($atts['limit']) && $atts['limit'] > 0 ) {
		$limit = "LIMIT 0, " . $atts['limit'];
	} else {
		$limit = "";
	}
	
	$allevents = array();
	$allevents = eventquery($label,$age,$range,$limit);
	
	$i = 1;
	foreach ($allevents as $event) {
		// decide what needs to be mentioned in the start date
		if(date('Y',$event['event_start']) == date('Y',time())) {
			$eventtime = strftime(DATE .' '. TIME,$event['event_start']);
			$shorttime = strftime(DATE,$event['event_start']);
		} else {
			$eventtime = strftime(DATE . ' ' . YEAR . ' ' . TIME,$event['event_start']);
			$shorttime = strftime(DATE,$event['event_start']);
		}
		
		// decide what needs to be mentioned in the end date
		if(date('Y',$event['event_end']) == date('Y',$event['event_start'])) { $end_year = "same"; } else { $end_year = "diff";}
		if(date('dmy',$event['event_end']) == date('dmy',$event['event_start'])) { $end_date = "same"; } else { $end_date = "diff";}		
		
		// Check how to open the links
		if(get_option('NNC_links') == "none") { $targetLoc = "_self"; $targetInf = "_self"; }
		elseif(get_option('NNC_links') == "both") { $targetLoc = "_blank"; $targetInf = "_blank"; }
		elseif(get_option('NNC_links') == "location") { $targetLoc = "_blank"; $targetInf = "_self"; }
		elseif(get_option('NNC_links') == "information") { $targetLoc = "_self"; $targetInf = "_blank"; }
		
		// decide if the event location should be a URL
		$evt_loc = NULL;
		if($event['event_loc'] != "" && $event['event_loc_url'] != "" ) {
			$evt_loc = '<div><strong class="event-label">'.__('Where:',NNC_TEXTDOMAIN).' </strong><a class="location" href="'.httpprefix($event['event_loc_url']).'" target="'.$targetLoc.'">'.$event['event_loc'].'</a></div>';
		} elseif($event['event_loc'] != "") {
			$evt_loc = '<div><strong class="event-label">'.__('Where:',NNC_TEXTDOMAIN).' </strong>'.$event['event_loc'].'</div>';
		}
		
		// Check if more info link should be displayed
		$evt_url = NULL;
		if(isset($atts['moreinfo']) && $atts['moreinfo'] == "no" ) {
			$evt_url = "";
		} elseif($event['event_url']  != "" ) {
			$evt_url = '<div class="info-link"><a class="url" href="'.httpprefix($event['event_url']).'" target="'.$targetInf.'">'.__('More information...',NNC_TEXTDOMAIN).'</a></div>';		
		}
		
		
		
		// Check if and how the times should be displayed
		$tz = get_option('NNC_timezone');
		$start_time = '<strong class="event-label">'.__('When:',NNC_TEXTDOMAIN).' </strong> <abbr class="dtstart" title="'.date('Y-m-d',$event['event_start']).'T'.date('H:i',$event['event_start']).$tz.'">'.$eventtime.'</abbr>';
		$start_notime = '<strong class="event-label">'.__('When:',NNC_TEXTDOMAIN).' </strong><abbr class="dtstart" title="'.date('Y-m-d',$event['event_start']).'">'.$shorttime.'</abbr>';
		if(isset($atts['time']) && $atts['time'] == "no") {
			if($end_date == "same") {
				$evt_time = $start_notime;
			} elseif($end_year == "same") {
				$evt_time = $start_notime . '<abbr class="dtend" title="'.date('Y-m-d',$event['event_end']).'"> - '. strftime(DATE,$event['event_end']) .'</abbr>';
			} else {
				$evt_time = $start_notime . '<abbr class="dtend" title="'.date('Y-m-d',$event['event_end']).'"> - '. strftime(DATE . " " . YEAR,$event['event_end']) .'</abbr>';
			}
		} elseif( isset($atts['time']) && $atts['time'] == "start") {
			$evt_time = $start_time;
		} elseif($end_date == "same") {
			$evt_time = $start_time . ' - <abbr class="dtend" title="'.date('Y-m-d',$event['event_end']).'T'.date('H:i',$event['event_end']).$tz.'">'. strftime( TIME ,$event['event_end']) .'</abbr>';
		} elseif($end_year == "same") {
			$evt_time = $start_time . ' - <abbr class="dtend" title="'.date('Y-m-d',$event['event_end']).'T'.date('H:i',$event['event_end']).$tz.'">'. strftime(DATE ." ".TIME,$event['event_end']) .'</abbr>';
		} else {
			$evt_time = $start_time . ' - <abbr class="dtend" title="'.date('Y-m-d',$event['event_end']).'T'.date('H:i',$event['event_end']).$tz.'">'. strftime(DATE ." ".YEAR." ".TIME,$event['event_end']) .'</abbr>';
		}
		
		if($i % 2) $evt_no = "odd"; else $evt_no = "even"; // adding odd and even classes for styling options
		$the_events[] =
		'<div class="vevent event-item '.$evt_no.' event-'.$i.'">'.
		'<h3 class="summary">'.stripslashes($event['event_title']).'</h3>
		<p class="description">'.stripslashes(nl2br($event['event_desc'])).'</p>
		<div class="event-time">'.$evt_time.'</div>'.
		$evt_loc.
		$evt_url.
		'</div>';
		$i++;
	} // end foreach ($allevents as $event)
	if(count($allevents) > 0) $items = '<style>.vevent abbr{text-decoration:none}</style>'.implode($the_events).'<a href="#" id="loadMore">Load More</a><script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script src="'.NNC_DOMAIN.'js/custom.js"></script><style>.vevent.event-item{display:none;}</style>'; else $items = "<p>There are no events to display</p>";
	
	return($items);
}
add_shortcode( 'events', 'displayevents' );

function age($age) {
	if($age == "expired") {
		$range = "event_end <= " . time();
	} elseif($age == "all") {
		$range = "event_end > 315532800"; // timestamp for jan 1st 1980 - assuming no event will be creted before that date
	} else {
		$range = "event end > " . time();
	}
	return $range;
}


function eventquery($label,$age,$range,$limit) {
	global $wpdb;
	$table_name = $wpdb->prefix . "nnc_events";
	if(!is_null($age) && !is_null($label)) {
		$conditions = "WHERE event_label = '$label' AND $range ORDER BY event_start $limit";
	} elseif(!is_null($age)) {
		$conditions = "WHERE $range ORDER BY event_start $limit";
	} elseif(!is_null($label)) {
		$currentTime = time();
		$conditions = "WHERE event_label = '$label' AND event_end >= $currentTime ORDER BY event_start $limit";
	} else {
		$currentTime = time();
		$conditions = "WHERE event_end >= $currentTime ORDER BY event_start $limit";
	}
	
	return $wpdb->get_results(" SELECT * FROM $table_name " . $conditions , "ARRAY_A");

}

// function to check url and set http prefix if needed
function httpprefix($httpurl) {
	if(substr(strtolower($httpurl),0,4) == "http") {
		$fullurl = $httpurl;
	} else {
		$fullurl = "http://".$httpurl;
	}
	return $fullurl;
}

// function to shorten long strings to $length characters and to prepend ... if it was actually shortend
function shortenstring($strng,$length) {
	if(strlen($strng) > $length) $longer = '...'; else $longer = '';
	return substr($strng,0,$length).$longer;
}

?>