<?php

$table = $_GET["table"];
echo "<strong>".$table."</strong>";

$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "SHOW COLUMNS FROM $table";
$result = $mysqli->query($sql);

while ($column = $result->fetch_assoc()){
    echo "<br> Field: ".$column["Field"]."<br> Type: ".$column["Type"];
}


?>