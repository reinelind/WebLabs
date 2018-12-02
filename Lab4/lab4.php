<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-family: Arial;">
	<form method="GET" action = "<?php $_PHP_SELF ?>">
		<input type = "text" name = "path">
		<input type = "submit" />
	</form>
	<table border = "1">
<?php
	require_once ('route.php');
	if ( isset($_GET['path']))
		if (is_dir ($_GET['path'])) {
			$descriptor = opendir ($_GET['path']);
			while (($element = readdir ($descriptor)) !== false){
				echo '<tr>';
				if (is_dir ($_GET['path'].'/'.$element))
					echo "<td> D </td>";
				else 
					echo "<td> F </td>";
				$path = $_GET['path'];
				$url = rawurlencode("$path/$element");
				if ($element == '.'){
					$element = 'Root';
					$url = substr($path, 0, 3);
					echo "<td> <a href = lab4.php?path=$url> $element </a> </td>";
				}
				elseif ($element == '..')
				{
					$element = 'Up';
					echo "<td> <a href = lab4.php?path=$url> $element </a> </td>";
				} else
				echo "<td> <a href = lab4.php?path=$url> $element </a> </td>";
				if (is_file ($_GET['path'].'/'.$element))
					echo '<td>'.FileSizeConvert (filesize($_GET['path'].'/'.$element)).'</td>';
				echo '</tr>';
			}
		}
		else 
			echo '<p> Такого каталогу не існує </p>'; 
?>

</table>

</body>
</html>