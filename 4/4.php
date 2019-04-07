<?php

$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');


$rowcount = 9;


$sql = "SELECT COUNT(*) as `total` FROM users";

$result = $mysqli->query($sql);
$countarr = ($result->fetch_assoc());
$count = $countarr["total"];


if ($count > $rowcount){

    for ($i=0; $i<$count; $i++){
        $arr[]=$i;
    }


    for ($i=0; $i<$rowcount; $i++){

        $fromcount = rand(1, $count);

        if (in_array($fromcount, $arr)) {
            $sql = "SELECT*FROM users LIMIT $fromcount, 1";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<br> name:" . $row["name"] . "<br> surname:" . $row["surname"];
            }
        } else $i = $i-1;
        $arr = array_diff($arr, [$fromcount]);
    }
}


$mysqli->close();

?>