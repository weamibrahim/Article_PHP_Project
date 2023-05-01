<?php
session_start();
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/topbar.php');
?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header" >
      <div class="container-fluid">
        
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid" style=" color: white;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-1 "></div>
          <div class="col-lg-3 ">
            <!-- small box -->
            <div class="small-box" style="width: 290px; background-color: rgba(1, 0, 1, 0.1); border: 1px solid blueviolet;">
              <div class="inner">
              <h2>Groups</h2>
              <div class="icon mt-1" style="display: inline;">
                <i><img src="../../assets/dist/img/people (2).png" width="50px" alt="group"></i>
            </div>
                <?php 
                    require '../../config/dbcon.php';
                    $query = "SELECT id FROM groups ORDER BY id";
                    $query_row = mysqli_query($con , $query);
                    $row = mysqli_num_rows($query_row);
                    echo '<h1>'.$row.'</h1>';
                ?>

              </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box "  style="width: 290px; background-color: rgba(1, 0, 1, 0.1); border: 1px solid blueviolet;">
              <div class="inner">
              <h2>Users</h2>
              <div class="icon mt-1" style="display: inline;">
                <i><img src="../../assets/dist/img/user.png" width="40px" alt="group"></i>
            </div>
              <?php 
                    require '../../config/dbcon.php';
                    $query = "SELECT id FROM users ORDER BY id";
                    $query_row = mysqli_query($con , $query);
                    $row = mysqli_num_rows($query_row);
                    echo '<h1>'.$row.'</h1>';
                ?>

              </div>

              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box" style="width: 290px; background-color: rgba(1, 0, 1, 0.1); border: 1px solid blueviolet;">
              <div class="inner">
              <h2>Articles</h2>
              <div class="icon mt-1" style="display: inline;">
                <i><img src="../../assets/dist/img/content-writing.png" width="40px" alt="group"></i>
            </div>
              <?php 
                    require '../../config/dbcon.php';
                    $query = "SELECT id FROM articles ORDER BY id";
                    $query_row = mysqli_query($con , $query);
                    $row = mysqli_num_rows($query_row);
                    echo '<h1>'.$row.'</h1>';
                ?>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <br>
        <!-- /.row -->
        <!-- Main row -->




                                          <!-- chart -->
        <div class="row mb-2" style="margin-left: 150px;">
          
        <div style="padding-left:40px; background-color:#0C0C19; padding-top:20px; width: 850px">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <canvas id="myChart" width="60" height="30"></canvas>
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
  </div>
    <!-- /.content-header -->
</div>

  
<?php
include('../includes/footer.php');
?>