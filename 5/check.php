<?php


$table = $_POST["table"];
$column = $_POST["column"];
$type = $_POST["type"];
$count=$_POST["count"];



$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "ALTER TABLE $table ADD $column $type NOT NULL";
$mysqli->query($sql);

for ($i=0; $i<$count; $i++){
    $sql = "INSERT INTO $table ($column) VALUES ()";
}



?>