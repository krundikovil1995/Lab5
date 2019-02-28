<?php


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

if ($mysqli->connect_error){
    echo "Connection error". $mysqli->connect_error;
}


$sql = "SHOW TABLES";
$result=$mysqli->query($sql);

if ($result->num_rows>0) {
     echo "<br> Таблицы базы данных:";
    while ($row = $result->fetch_assoc()) {
        echo "<br><strong> " . $row["Tables_in_testdb"]."</strong>";
        $table = $row["Tables_in_testdb"];
        $sql = "DESCRIBE $table";
        $res = $mysqli->query($sql);

        if ($res->num_rows >0){
            echo "<br> Данная таблица содержит:";
            while ($row2 = $res->fetch_assoc()){
                echo "<br> Field: ".$row2["Field"]."<br> Type: ".$row2["Type"]."<br> Null: ".$row2["Null"]."<br> key: ". $row2["Key"];
            }
        }
    }
}


$mysqli->close();


?>