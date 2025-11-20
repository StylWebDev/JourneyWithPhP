<?php
global $areas;
require_once __DIR__ . '/../functions/functions.inc.php';

$cities = ["Berlin","Cape Town","Dubai","Mumbai", "Rio de Janeiro","Singapore","Cancun","Colombo","Lima","Nairobi","Seoul", "Sydney"];

if (isset($_GET['city']) && in_array($_GET['city'], $cities)) {
    foreach ($areas as $area) {
        if ($area->city == $_GET['city']) {
            $data = json_decode(file_get_contents('compress.bzip2://'. __DIR__ . "/../../data/$area->filename"))->results;
            $unit =$data[0]->unit;
            break;
        }
    }
}else header("Location: ".e('/php/AQI project/index/'));

$stats = ['pm25'=> [], 'pm10'=>[]];
foreach ($data as $result){
    if (($result->parameter) !== 'pm25' && ($result->parameter) !== 'pm10') continue;
        $month = substr($result->date->local, 0, 7);
        if(!in_array($month,array_keys($stats[$result->parameter]))) $stats[$result->parameter][$month] = [];
        array_push($stats[$result->parameter][$month], $result->value);
}
$avg_vals = ['pm25'=>[], 'pm10'=>[]];
foreach ($stats as $parameter => $months) {
    foreach ($months as $month => $val) {
        if (count($stats['pm10']) < count($stats[$parameter]) && $parameter === 'pm25') $avg_vals['pm10'][$month] = 0;
        if (count($stats['pm25']) < count($stats[$parameter]) && $parameter === 'pm10') $avg_vals['pm25'][$month] = 0;
        else $avg_vals[$parameter][$month] = round(abs(array_sum($val)/count($val)),2);
    }
}

foreach ($areas as $area) {
    if ($area->city === $_GET['city']) $title = $_GET['city']." $area->flag";
}


?>

<div>
    <h2><?php echo e($title) ?></h2>
    <div style="width: 50vw">
        <canvas id="myChart"  ></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php foreach (array_keys($avg_vals['pm10']) as $month): echo "\"$month\","; endforeach; ?>],
                datasets: [
                    {
                        label: 'AQI, PM10 in <?php echo $unit ?>',
                        data: [<?php foreach (array_keys($avg_vals['pm10']) as $month): echo $avg_vals['pm10'][$month].','; endforeach; ?>],
                        borderColor: '#B20000',
                        backgroundColor: '#FF0000'
                    },
                    {
                        label: 'AQI, PM25 in <?php echo $unit ?>',
                        data: [<?php foreach (array_keys($avg_vals['pm25']) as $month): echo $avg_vals['pm25'][$month].','; endforeach; ?>],
                        borderColor: '#007C7C',
                        backgroundColor: '#00B2B2'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Pollution Meter For <?php echo $_GET['city'] ?>'
                    }
                }
            },
        })
    </script>
    <table>
        <thead>
            <tr>
                <th>Months</th>
                <th>PM10</th>
                <th>PM25</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach (array_keys($avg_vals['pm10']) as $month): ?>
                    <tr>
                        <td><?php echo e($month);?></td>
                        <td><?php echo e($avg_vals['pm10'][$month]." $unit");?></td>
                        <td><?php echo e($avg_vals['pm25'][$month]." $unit");?></td>
                    </tr>
                <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../layout/header.php' ?>


<?php require __DIR__ . '/../layout/footer.php' ?>