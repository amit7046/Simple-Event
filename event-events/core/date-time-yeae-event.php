<?php

// The date
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    define('DATE', __('%a %B %#d',EVNT_TEXTDOMAIN)); // For WINDOWS %e doesn't work
} else {
	define('DATE', __('%a %B %e',EVNT_TEXTDOMAIN));
}
// The time
if(get_option('EVNT_clock') == "12") {
	define('TIME', __('%l:%M %p',EVNT_TEXTDOMAIN)); // 12 hour AM/PM
} else {
	define('TIME', __('%H:%M',EVNT_TEXTDOMAIN)); // 24 hour military time
}
// The year
define('YEAR','%Y');

?>