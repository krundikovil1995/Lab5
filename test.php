<?php

$localhost = "localhost";
$name = "Krun";
$password = "Koska200895";

$mysqli = new mysqli($localhost, $name, $password, "testDB");

$sql = "INSERT INTO users(name_user, surname_user, password)
VALUES ('Ivan', 'Ivanov', '12345'),
        ('Alex', 'Alexov', '123436'),
        ('Alex', 'Petrov', '435346')";

if ($mysqli->query($sql)===TRUE){
    echo "Records created";
}
$mysqli->close();




?>