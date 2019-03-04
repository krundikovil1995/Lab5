<?php

require "db.php";

if (isset($_POST["enter"])){
    if (!empty($_POST["login"]) && !empty($_POST["pass"])){
       $login = trim($_POST["login"]);
       $pass = sha1(trim($_POST["pass"]));

       $sql = "SELECT name, password FROM register WHERE name='$login' && password='$pass'";
       $result = $db->query($sql);
       if (mysqli_num_rows($result) != 0) {
           echo "Вошли";
       } else echo "Такого пользователя не существует";

    }


}


?>


<link rel="stylesheet" href="style.css">

<h1> Добро пожаловать на наш сайт</h1>
<form action="index.php" method="post">
    <label for="login">Логин: </label>
    <input type="text" name="login">
    <label for="pass">Пароль: </label>
    <input type="password" name="pass">
    <button class="index" type="submit" name="enter">Войти</button>
    <button class = "index" type="button" name="submit"><a class="index" href="register.php">Зарегистрироваться</a></button>
</form>


