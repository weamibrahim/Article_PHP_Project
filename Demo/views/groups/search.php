<?php
session_start();
include '../includes/header.php';
include('../includes/topbar.php');

require_once("../../vendor/autoload.php");
?>



<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">

<div class="container">
    <form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
    <div class="shadow p-3 mb-5 mt-4  rounded-4 container ">
        <p class="text-center fs-1 fst-italic" style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9; margin-top: -50px">Search Group</p>
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Search by name or description">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-info" name="search_by_name_desc" style="background-color: #B988E9; border-color: #B988E9; color:white">Search by name or description</button>
    </div>
    </form>
    <?php
    $db = new MySQLHandler("groups");
    if (isset($_POST['search_by_name_desc'])) {
        $name = $_POST['name'];
    $results = $db->search('name', $name, 'description', $name);

    ?>
        <table class="table  mt-5 ">

            <thead class="table-dark text-center">
                <tr>
                    <th scope="col" style="background-color:#D3B2B7">#</th>
                    <th scope="col" style="background-color:#D3B2B7">Icon</th>
                    <th scope="col" style="background-color:#D3B2B7">Name</th>
                    <th scope="col" style="background-color:#D3B2B7">Decription</th>
                </tr>
            </thead>

            <tbody class="text-center" style="color: white;">


                <?php

                if (!empty($results)) {
                    foreach ($results as $result) {

                ?>

                        <tr>

                            <td><?php echo $result['id'] ?></td>
                            <!-- $result['icon'] -->
                            <td><?php echo '<img  style ="wigth:20px;height:20px;"src="../../uploads/' . $result["icon"] . '">'; ?></td>
                            <td><?php echo $result['name'] ?></td>
                            <td><?php echo $result['description'] ?></td>
                        </tr>




                    <?php
                    }
                } else {

                    ?>
                    <td> no record </td>
                    <td> no record </td>
                    <td> no record </td>
                    <td> no record </td>
                <?php
                }
                ?>

            </tbody>



        </table>

    <?php
    }
    ?>
</div>
  </div>
</div>

 
<?php
include('../includes/sidebar.php');
require_once('../includes/footer.php');
?>