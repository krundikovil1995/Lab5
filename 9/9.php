<?php

function dm($data)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}


$db = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "SELECT name, surname, password FROM users";
$time = microtime(true);
$memory = memory_get_usage();
$result = $db->query($sql);
$time2 = microtime(true);
$memory2 = memory_get_usage();

while ($row = $result->fetch_assoc()){
     foreach ($row as $value){
        echo  "<p>". $value."</p>";
     }
}

echo ($time2 - $time);
echo "<p>".($memory2 - $memory)." байт </p>";


?>