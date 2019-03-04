<?php

if (isset($_POST["email"])) {
    $mail = $_POST["email"];
    if (!preg_match('/^(A-Za-z0-9_-]+\.)*[A-Za-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $mail)){
        echo "Некорректный email!";
    } else {
        $mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

        $sql = "SELECT email FROM mail WHERE email='$mail'";
        $result = $mysqli->query($sql);

        if (mysqli_num_rows($result) != 0) {
            $arrerrors[] = "Ошибка, такой email уже существует в базе!!!";
        } else {
            $sql = "INSERT INTO mail(email) VALUES ('$mail')";
            $mysqli->query($sql);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>the 6 task</title>
</head>
<body>

<h3> Форма для ввода e-mail</h3>
<form action="6.php" method="post">
    <label for="email">E-mail: </label>
    <input type="email" id="email" name="email"><p></p>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
