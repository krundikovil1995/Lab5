<?php

$news = $_GET['date'];


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "SELECT*FROM news WHERE date ='$news'";
$res = $mysqli->query($sql);
while ($row = $res->fetch_assoc()){
       echo "<br> date: ".$row["date"]."<br> holiday: ".$row["news"];
}

$mysqli->close();




?>