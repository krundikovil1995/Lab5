<?php

require "db.php";


if (isset($_POST["register"])) {
    $bol = FALSE;

    if ((trim($_POST["login"])) == '') {
        echo "Введите логин";
    }
    else if ((trim($_POST["email"])) == '') {
        echo  "Введите email";
    }
    else if ((trim($_POST["pass"])) == '') {
        echo  "Введите пароль";
    }
    else if ((trim($_POST["pass"])) != trim($_POST["pass2"])) {
        echo  "Пароли не совпадают!";
    }
    else if (!preg_match('/^(A-Za-z0-9_-]+\.)*[A-Za-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $_POST["email"])){
        echo "Некорректно введен email";
    } else {$bol = TRUE;}


    if ($bol == TRUE) {
        $name = $_POST["login"];
        $mail = $_POST["email"];
        $pass = sha1($_POST["pass"]);

        $sql = "SELECT name FROM register WHERE name='$name'";
        $result = $db->query($sql);
        $sql2 = "SELECT email FROM register WHERE email='$mail'";
        $result2 = $db->query($sql2);

       if (mysqli_num_rows($result) != 0){
            echo "Такой логин уже существует!";
        } else if ((mysqli_num_rows($result2)) != 0){
            echo "Такой email уже существует";
        } else {
            $sql = "INSERT INTO register (name, email, password) VALUES ('$name', '$mail', '$pass')";
            $res = $db->query($sql);
            echo "Регистрация прошла успешно!";
        }
    }

}




?>

<link rel="stylesheet" href="style.css">
<h2>Регистрация:</h2>
<form action="register.php" method="post">
    <label for ="login">Логин: </label>
    <input type="text" name="login"><p>
    <label for="email">Email: </label>
    <input type="email" name="email"><p>
    <label for="pass">Пароль: </label>
    <input type="password" name="pass"><p>
    <label for="pass2">Повторите пароль: </label>
    <input type="password" name="pass2"><p>
    <button class="submit" type="submit" name="register">Зарегистрироваться</button>
</form>
