<?php

class Color {
    private $color;

    public function __construct ($color){
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

}
function serializecolor ($color)
{
    $color = new Color($color);
    $string = serialize($color);
    return $string;
}

function createbasecolor ($string)
{
    $mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');
    $sql = "INSERT INTO colors (color) VALUES ('$string')";
    $mysqli->query($sql);
    $mysqli->close();
}

function getbasecolors ()
{
    $mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');
    $sql = "SELECT color FROM colors";
    $result = $mysqli->query($sql);
    While ($row = $result->fetch_assoc()) {
        $array[] = $row["color"];
    }
    $mysqli->close();
    return $array;
}

function unserailizebasecolors ($array){
    foreach ($array as $key => $value){
        $arrobject[] = unserialize($value);
    }
    return $arrobject;
}

$color = "brown";
$string = serializecolor($color);
$array = getbasecolors();
$unarr=unserailizebasecolors($array);
print_r($unarr);


?>