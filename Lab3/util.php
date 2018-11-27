<?php
	function validate_date ($date_str,$format = 'd.m.y') {
		$Date =  $date_str;
		$d = DateTime::createFromFormat($format, $Date);
    	return $d && $d->format($format) === $Date;
	}

	function validate_time ($time_str, $format = 'H:i') {
		$time = $time_str;
		$t = DateTime::createFromFormat($format, $time);
		return $t && $t->format($format) === $time;
	}

?>