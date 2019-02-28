<?php
function dm($data)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

$mysqli = new mysqli('localhost', 'Krun', 'Koska200895', 'testdb');

$sql = "SELECT*FROM news";
$res = $mysqli->query($sql);
while ($row = $res->fetch_assoc()){
    $array["news"][]=$row["news"];
    $array["date"][]=$row["date"];
}
dm($array);

$mysqli->close();


$year = 2019;

$year = "{$year}-01-01";

$begin = new DateTime($year);
$end = new DateTime($year);
$end->modify('+1 year');

$interval = new DateInterval('P1M');
$daterange = new DatePeriod($begin, $interval, $end);

$result = [];
$count = $begin->format('W');
foreach ($daterange as $startMonth):
    $endMonth = new DateTime($startMonth->format("Y-m-d"));
    $endMonth->modify('+1 month');

    $dayInterval = new DateInterval('P1D');
    $dayDaterange = new DatePeriod($startMonth, $dayInterval, $endMonth);

    $bool = true;

    $month = [
        'month' => $startMonth->format('F')
    ];

    $week = [];
    foreach ($dayDaterange as $day) {
        if ($count % 7 == 0) {
            $month['weeks'][] = $week;
            $week = [];
        }
        $count++;

        if ($bool) {
            for ($i = 0; $i < $day->format("N") - 1; $i++) {
                $week[] = '';
            }
            $bool = false;
        }

        $week[] = $day->format("d");
    }
    $month['weeks'][] = $week;

    $result[] = $month;



    ?>

<?php endforeach; ?>


<?php foreach ($result as $item): ?>
    <table>
        <thead>
        <tr>
            <th colspan='7'><?php echo $item['month']; ?></th>
        </tr>
        <tr>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th>Сб</th>
            <th>Вс</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($item['weeks'] as $week): ?>
            <tr>
                <?php foreach ($week as $day): ?>
                    <td>
                        <?php foreach ($array as $key=>$value){
                        } echo $day; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>


<style>
    body {
        display: flex;
    }

    body table {
        margin: 10px;
    }
</style>