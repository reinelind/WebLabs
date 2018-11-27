<!DOCTYPE html>
<html>
    <head>
        <title>lab4</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="lab4.php" method="get">
            <div>
                <label for="path">Enter path:</label>
                <input type="text" name="path">
            </div>
        </form>
        <table>
           <tr>
               <th>Type</th>
               <th>Name</th>
               <th>Size</th>
           </tr>
            <?php
                $path = $_GET["path"];
                if(is_dir($path)){
                    $scan = scandir($path);
                    $files = array();
                    $i = 0;
                    while($i < count($scan)){
                        if(is_dir($path . $scan[$i])){
                            if($scan[$i] == "."){
                                echo "<tr><td></td><td><a href='?path=/'>Up</a></td><td></td></tr>";
                            }
                            elseif($scan[$i] == ".."){
                                $arr = array();
                                $exp = explode("/", $path);
                                for($j = 0; $j < count($exp) - 2; $j++){
                                    array_push($arr, $exp[$j]);
                                }
                                $imp = implode("/", $arr)."/";
                                echo "<tr><td></td><td><a href='?path=$imp'>Back</a></td><td></td></tr>";
                            }
                            else{
                                echo "<tr><td><img src='folder.jpg' /></td><td><a href='?path=$path$scan[$i]/'>$scan[$i]</a></td><td></td></tr>";
                            }
                        }
                        else{
                            array_push($files, $scan[$i]);
                        }
                        $i++;
                    }
                    $j = 0;
                    while($j < count($files)){
                        $size = filesize($path.$files[$j]);
                        echo "<tr><td><img src='file.jpg' /></td><td>$files[$j]</td><td>$size</td></tr>";
                        $j++;
                    }
                }
                else{
                    echo "<p>Wrong path</p>";
                }
            ?>
        </table>
    </body>
</html>