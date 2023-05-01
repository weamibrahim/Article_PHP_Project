<?php
session_start();
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/topbar.php');
?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        <div style="padding-left:40px; background-color:#0C0C19; padding-top:20px; width: 850px">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <canvas id="myChart" width="60" height="40"></canvas>
    <?php
include('../../config/dbcon.php');
$sql = "SELECT g.name, COUNT(u.id) as num_users, u.type as type
        FROM groups g 
        LEFT JOIN users u ON u.groupid = g.id 
        GROUP BY g.name";
        
$results =  mysqli_query($con,$sql);
$labels = array();
$data = array();

foreach ($results as $row) {
    $labels[] = $row['type'];
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>


  
<?php
include('../includes/footer.php');
?>