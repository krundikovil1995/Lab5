<?php

$mail = $_POST["email"];


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "SELECT email FROM mail WHERE email='$mail'";
$result = $mysqli->query($sql);

if (mysqli_num_rows($result) != 0){
    echo "Ошибка, такой email уже существует в базе!!!";
} else {
    $sql="INSERT INTO mail(email) VALUES ('$mail')";
    $mysqli->query($sql);
    echo "Email внесён в базу данных";
}


?>