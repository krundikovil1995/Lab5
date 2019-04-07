<?php


$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');
$sql = "SHOW TABLES";
$tables = $mysqli->query($sql);
while ($row = $tables -> fetch_assoc()){
    $nametable = $row["Tables_in_testdb"];
    echo "<br> Table:<a href='tables.php?table=$nametable'>".$row["Tables_in_testdb"]."</a>";
}

?>
<h3>Добавление данных в таблицу</h3>
<form action='check.php' method='POST'>
<label for='table'>Имя таблицы</label>
<input type='text' name='table' id='table'><p>
<label for='column'>Колонка</label>
<input type='text' name='column' id='column'><p>
<label for='type'>Тип данных: </label>
<input type='text' id='type' name='type'><p>
<label for="count">Количество записей: </label>
<input type="number" name="count" id="count"><p>
<button type='submit'>Отправить</button>