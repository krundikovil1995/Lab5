<?php


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

if ($mysqli->connect_error){
    echo "Ошибка подключения".$mysqli->connect_error;
}

$sql = "SELECT*FROM `users`";
$result = $mysqli->query($sql);

if ($result->num_rows > 0){
    while ($row=$result->fetch_assoc()){
        echo "<br> id:".$row["name_id"]."<br> name:".$row["name"]."<br> surname:". $row["surname"];
    }
}


$sql = "INSERT INTO users(name, surname, password)
VALUES ('Kolya', 'Kolev', '5435234')";

if ($mysqli->query($sql)===TRUE){
    echo "<br>" "Record created";
}

$sql = "UPDATE users SET name='Stas' WHERE name='Ivan'";

if ($mysqli->query($sql)===TRUE){
    echo "Record updated";
}

$sql = "DELETE FROM users WHERE name='Petr'";

if ($mysqli->query($sql)===TRUE){
    echo "Record deleted";
}


$mysqli->close();




?>