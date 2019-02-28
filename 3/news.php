<?php

$news = $_GET['date'];


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "SELECT*FROM news";
$res = $mysqli->query($sql);
while ($row = $res->fetch_assoc()){
    $array["news"][]=$row["news"];
    $array["date"][]=$row["date"];
}

$mysqli->close();


foreach($array["date"] as $key=>$value){
    if ($value == $news){
        echo $array["news"][$key];
        echo $array["date"][$key];
    }
}


?>