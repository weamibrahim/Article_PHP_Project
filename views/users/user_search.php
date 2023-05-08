<?php
include '../header.php';
include '../footer.php';

require_once("../../vendor/autoload.php");



?>



<div class="container">


    <form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
        <div class="shadow p-3 mb-5 mt-4 bg-body-tertiary rounded-4 container bg-info-subtle bg-opacity-50">
            <p class="text-center fs-1 fst-italic">Search user</p>
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Search by name or group">
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-info" name="search_by_name_group">Search by name or group</button>
        </div>

    </form>
    <?php
    $db = new MySQLHandler("users");
    //$id=$_GET['updateId'];
    $dbs = new MySQLHandler("groups");
    $groups = $dbs->get_all_record_paginated(array(), 0);
    
    $group_names = array();
    
    foreach($groups as $group) {
      $group_names[$group["id"]] = $group["name"];
    }
    //var_dump($groups);
    if (isset($_POST['search_by_name_group'])) {
        $name = $_POST['name'];

        $results = $db->search('name', $name, 'groupid', $name);
       

    ?>
        <table class="table table-striped  mt-5 ">

            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">userName</th>
                    <th scope="col">Email</th>
                    <th scope="col">name</th>
              
                    <th scope="col">group name</th>
                    <th scope="col">type</th>
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

                            <td><?php echo $result['username'] ?></td>
                            <td><?php echo $result['email'] ?></td>
                            <td><?php echo $result['name'] ?></td>
                           
                            <td><?php echo $group_names[$result['groupid']] ?></td>
                            <td><?php echo $result['type'] ?></td>


                        </tr>




                    <?php
                    }
                } else {

                    ?>
                    <td> no record </td>
                    <td> no record </td>
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