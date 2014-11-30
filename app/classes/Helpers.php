<?php
//putenv("TZ=Australia/Melbourne");
//setlocale(LC_TIME, 'en_AU.ISO_8859-1');
date_default_timezone_set('Australia/Melbourne');

class Helpers {
    public static function doMessage() {
        $message = 'Hello';
        return $message;
    }


public static function nicetime($date){
	$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	$lengths         = array("60","60","24","7","4.35","12","10");

	$now             = time();
	$unix_date         = strtotime($date);

	   // check validity of date
	if(empty($unix_date)) {   
	    return "Bad date";
	}

	// is it future date or past date
	if($now > $unix_date) {   
	    $difference     = $now - $unix_date;
	    $tense         = "ago";

	} else {
	    $difference     = $unix_date - $now;
	    $tense         = "from now";
	}

	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	    $difference /= $lengths[$j];
	}

	$difference = round($difference);

	if($difference != 1) {
	    $periods[$j].= "s";
	}

	return "$difference $periods[$j] {$tense}";
}



}


