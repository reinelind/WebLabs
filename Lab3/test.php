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
	$array = new SplFixedArray (50);
	$i = 1;
	$filesize = filesize ($filename);
	while (!feof($file)) {
		
		$line = fgets ($file, $filesize);
		$array[$i] = 0;
		if ($line != "\r\n"){
			if (preg_match ($pattern, $line, $match)) {
				if (validate_date ($match[1], $match[2] )) {
				echo '<tr>'	;
					echo '<td>';
						echo $match[1];
					echo '</td>';
					echo '<td>';
						echo $match[2];
					echo '</td>';
					echo '<td>';
						echo $match[3];
					echo '</td>';
				echo '</tr>';
			
			} else {
			$array[$i] = 1;
			echo '<tr>';
				echo '<td colspan=3>';
					echo 'Лінія '.$i.': Невірний формат введення дати ';
				echo '</td>';
			echo '</tr>';
		} 
			
		} else {

			echo '<tr>';
				echo '<td colspan=3>';
					echo 'Лінія '.$i.' : Такої дати не існує';
				echo '</td>';
			echo '</tr>';
		}

		}
		$i+=1;
	} 
	fclose($file);
echo '</table>';

?>	


</body>
</html>