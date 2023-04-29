<?php
session_start();
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
?>
<div style="height: 656px; width:1536px; padding-left:550px; background-color:#0C0C19; padding-top:20px; padding-bottom:20px">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <canvas id="myChart" width="70" height="70"></canvas>
    <?php
include('../../config/dbcon.php');
$sql = "SELECT g.name, COUNT(u.id) as num_users 
        FROM groups g 
        LEFT JOIN users u ON u.groupid = g.id 
        GROUP BY g.name";
        
$results =  mysqli_query($con,$sql);
$labels = array();
$data = array();

foreach ($results as $row) {
    $labels[] = $row['name'];
    $data[] = $row['num_users'];
}

$data = array(
    'labels' => $labels,
    'datasets' => array(
        array(
            'label' => 'Number of Users in each group',
            'data' => $data,
            'dataFontColor' => '#BC8CE9',
            'backgroundColor' => '#BC8CE9',
            'borderColor' => '#BC8CE9',
            'borderWidth' => 2.5,
            'lablesColor' => '#BC8CE9'
            
        )

        )
);?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: <?php echo json_encode($data); ?>,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
</div>
  
<?php
include('../includes/footer.php');
?>