<!DOCTYPE html>
<html>
<head>
	
	<title>Reading a file using PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	
	require('util.php');
	$filename = "tmp.txt";
	$file = @fopen ($filename, "r") or die ("Файл не існує");

	echo '<table>';
		echo '<caption> Календар подій </caption>';
	echo '<tr>';
		echo '<th>Дата</th>';
		echo '<th>Час</th>';
		echo '<th>Подія</th>';
	echo '</tr>';
	
	$pattern = "/(\d+.\d+.\d+)\s*\/\s*(\d+:\d+)\s*\/([\p{Cyrillic}\s*]+)/u";
	$date_pattern = "/(\d+.\d+.\d+)\s*\//";
	$time_pattern = "/\s*(\d+:\d+)\s*\//";
	$text_pattern = "/\/([\p{Cyrillic}\s*]+)/u";
	$array = new SplFixedArray (50);
	$i = 1;
	$filesize = filesize ($filename);
	while (!feof($file)) {
		$line = fgets ($file, $filesize);
		echo '<tr>';

		if (preg_match ($date_pattern, $line, $date_match) 
			&& validate_date($date_match[1])) {
			echo '<td>';
				echo $date_match[1];
			echo '</td>';
		}
			else {
				echo '<td>';
					echo 'Помилка при введені дати';
				echo '</td>';
			}
		if (preg_match($time_pattern, $line, $time_match)
			&& validate_time($time_match[1])) {
			echo '<td>';
				echo $time_match[1];
			echo '</td>';
		}
		  else{
		  	echo '<td>';
					echo 'Помилка при введені часу';
				echo '</td>';
			}
			echo '<td>';
				preg_match($pattern,$line, $match);
				echo $match[3];
			echo '</td>';
			echo '</tr>';
	}
				
			// if (preg_match ($pattern, $line, $match)) {
				// if (validate_date ($match[1], $match[2] )) {
				// echo '<tr>'	;
				// 	echo '<td>';
				// 		echo $match[1];
				// 	echo '</td>';
				// 	echo '<td>';
				// 		echo $match[2];
				// 	echo '</td>';
				// 	echo '<td>';
				// 		echo $match[3];
				// 	echo '</td>';
				// echo '</tr>';
			
	
	fclose($file);
echo '</table>';

?>	


</body>
</html>