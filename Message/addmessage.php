<?php

$mysqli = new mysqli("localhost", "Krun", "Koska200895", "testdb");

if (empty($_POST['name'])) exit("Поле не заполнено");
if (empty($_POST['content'])) exit("Поле не заполнено");

$sql = "INSERT INTO message('message_id', 'name', 'message_date') VALUES(NULL , :name, NOW())";
$msg = $mysqli->prepare($sql);
$msg->execute(['name' => $_POST['name']]);



$msg_id = $mysqli->lastInsertId();

$sql = "INSERT INTO message_content('content_id', 'content', 'message_id') VALUES(NULL , :content, :message_id)";
$msg = $mysqli->prepare($sql);
$msg->execute(['content'=> $_POST['content'], 'message_id'=>$msg_id]);

header("Location: index.html");

if ($mysqli->error) {}
echo "error";

?>