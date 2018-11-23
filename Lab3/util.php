<?php
	function validate_date ($date_str, $time_str,$format = 'd.m.y H:i') {
		$Date =  $date_str." ".$time_str;
		$d = DateTime::createFromFormat($format, $Date);
    	return $d && $d->format($format) === $Date;
	}

?>