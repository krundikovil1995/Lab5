<?php

function dm($data)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}


$db = new mysqli('localhost', 'Krun', 'Koska200895', 'mydb');


    $sql = "SELECT student.student_name, student.student_surname, subject.subject, grade.grade FROM student JOIN grade ON student.student_id = grade.student_student_id JOIN subject ON subject.subject_id = grade.subject_subject_id;";

    $result = $db->query($sql);


    while ($row = $result->fetch_assoc()) {
        $array['name'][] = $row["student_name"];
        $array['surname'][] = $row["student_surname"];
        $array['sub'][] = $row["subject"];
        $array['grade'][] = $row["grade"];
    }
    $count = count($array["name"]);

    $arrname=array();
    foreach ($array["name"] as $value){
        if (!in_array($value, $arrname)){
           $arrname[]=$value;
        }
    }


 foreach ($arrname as $value) {
     $sql = "SELECT student.student_name, student.student_surname, subject.subject, grade.grade FROM student JOIN grade ON student.student_id = grade.student_student_id JOIN subject ON subject.subject_id = grade.subject_subject_id WHERE student_name = '$value';";
     $result = $db->query($sql);
     while ($row = $result->fetch_assoc()){
         $arrres[$value]['sub'][] = $row["subject"];
         $arrres[$value]['grade'][] = $row["grade"];
     }
 }
$count2 = count($arrres);



?>

<table>
    <tr>
        <th>Имя ученика:</th>
        <th>Фамилия ученика:</th>
        <th>Предмет: </th>
        <th>Оценка: </th>
    </tr>
    <?php for($i=0; $i<$count; $i++){ ?>
    <tr>
    <td> <?php echo $array["name"][$i]; ?> </td>
    <td> <?php echo $array["surname"][$i];  ?> </td>
     <td> <?php echo $array["sub"][$i];  ?> </td>
     <td> <?php echo $array["grade"][$i]; } ?> </td>
    </tr>
</table>


<table>
    <tr>
        <th>Имя ученик:</th>
        <th>Средний балл:</th>
        <th>Максимальный балл:</th>
        <th>Минимальный балл:</th>
    </tr>
    <?php foreach ($arrres as $key=>$value): ?>
    <tr>
        <td> <?php echo $key; ?> </td>
        <td> <?php $count = count($arrres[$key]['grade']); $sum = 0; foreach ($arrres[$key]['grade'] as $value){ $sum = $sum + $value; } $arg = $sum/$count; echo $arg; ?> </td>
        <td> <?php echo max($arrres[$key]['grade']); ?></td>
        <td> <?php echo min($arrres[$key]['grade']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>


