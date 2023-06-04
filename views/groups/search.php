<?php
include '../header.php';
include '../footer.php';

require_once("../../vendor/autoload.php");



?>



<div class="container">


    <form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
    <div class="shadow p-3 mb-5 mt-4 bg-body-tertiary rounded-4 container bg-info-subtle bg-opacity-50">
        <p class="text-center fs-1 fst-italic">Search Group</p>
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Search by name or description">
        </div>
        <!-- <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" placeholder="Search by description">
        </div> -->
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-info" name="search_by_name_desc">Search by name or description</button>
    </div>
        <!-- <div class="shadow p-3 mb-5 mt-4 bg-body-tertiary rounded-4  container bg-info-subtle bg-opacity-50">
            <p class="text-center fs-1 fst-italic"> search Group</p>
            <input type="text" class="form-control" id="saerch" name="name">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-info " name="search_by_name">search by name</button>
        </div> -->
    </form>
    <?php
    $db = new MySQLHandler("groups");
    //$id=$_GET['updateId'];

    //var_dump($groups);
    if (isset($_POST['search_by_name_desc'])) {
        $name = $_POST['name'];
        //$description = $_POST['description'];
    $results = $db->search('name', $name, 'description', $name);
        // include 'connect.php';

        // if (isset($_POST['search_by_name'])) {
        //     $name = $_POST['name'];

        //     var_dump($name);
        //     $sql = "select * from `groups` where name='$name'";
        //     var_dump($sql);
        //     $result = mysqli_query($con, $sql);

        //     if ($result) {
        //         echo "sucess";
        //         //header('location:display.php');
        //     } else {
        //         die(mysqli_error($result));
        //     }


    ?>
        <table class="table table-striped  mt-5 ">

            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">icon</th>
                    <th scope="col">name</th>
                    <th scope="col">decription</th>
                </tr>
            </thead>

            <tbody class="text-center">


                <?php

                if (!empty($results)) {
                    foreach ($results as $result) {
                        //echo $result['name'] . '<br>';

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