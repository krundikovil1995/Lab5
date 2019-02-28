<?php


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

if ($mysqli->connect_error){
    echo "Connection error". $mysqli->connect_error;
}


$sql = "SHOW TABLES";
$result=$mysqli->query($sql);

if ($result->num_rows>0) {
     echo "<br>  Таблицы базы данных:";
    while ($row = $result->fetch_assoc()) {
        echo "<br><strong> " . $row["Tables_in_testdb"].":</strong>";
        $table = $row["Tables_in_testdb"];
        $sql = "DESCRIBE $table";
        $res = $mysqli->query($sql);

        if ($res->num_rows >0){
            echo "<br> &nbsp&nbsp&nbspДанная таблица содержит: ";
            while ($row2 = $res->fetch_assoc()){
                echo "<br>&nbsp&nbsp&nbsp&nbsp&nbsp - Field: ".$row2["Field"]."<br>&nbsp&nbsp&nbsp&nbsp&nbsp - Type: ".$row2["Type"]."<br>&nbsp&nbsp&nbsp&nbsp&nbsp - Null: ".$row2["Null"]."<br>&nbsp&nbsp&nbsp&nbsp&nbsp - key: ". $row2["Key"];
            }
        }
    }
}


$mysqli->close();


?>