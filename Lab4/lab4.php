<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lab 4</title>
	<style type="text/css">
	body {
		font-family: Roboto;
	}
</style>
</head>


	
	
<body>
	<form action = "<?php $_PHP_SELF ?>" method = "GET">
		
		<input type = "submit"  name = "button" value = "Go to" action = "route.php" >
		<input type = "submit"  name = "button" value = "Root" action = "route.php">
		<input type = "submit"  name = "button" value = "Home" action = "route.php">
		Path: <input type = "text" name = "path" value=<?php @$_GET['path']?> />
<?php
require_once ('route.php');

	if ($handle = @opendir($_GET['path'])) {

		echo '<table border = "1">';
		while (false !== ($entry = readdir($handle))) {
			echo '<tr>';
			if ($entry != "." && $entry != ".." ) {
				echo '<td>';
				echo $entry;
				echo '</td>';
				$file = $_GET['path']."\\".$entry;

				if (is_file($file)) {
					echo '<td>';
					echo (filesize($file));
					echo '</td>';
					echo '<td>';
					echo "F";
					echo '</td>';
				}
				else { 
					echo '<td> </td>';
					echo '<td>';
					echo "D";
					echo '</td>';
				}

			}
			echo '</tr>';
		}
		echo '</table>';
		closedir($handle);
	} 
	else {
		echo 'Такого каталогу не існує';
	}

	?>

		
	</form>

	


</body>
</html>