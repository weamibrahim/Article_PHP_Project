<?php 

 
$handler = new MySQLHandler("users");

 $id=intval($_GET['user']);
 $res=$handler->get_record_by_id($id);
 if(isset($_POST['submit'])){
  $newdata=array("name"=>$_POST['name']  ,"number"=>$_POST['number'],"group_id"=>$_POST['group_id']);
  $handler->connect();
  $handler->update($newdata,$id);
  header("Location: http://localhost/php-project/index.php?user");

 }


 
                   ?>
           
<div class="container p-5">

<h4>Edit User Detail</h4>

<form id="update-Items" enctype='multipart/form-data' action="" method="POST">
	<div class="form-group">
      <input type="text" class="form-control" id="product_id"  hidden>
    </div>
    <div class="form-group">
      <label for="name">User Name:</label>
      <input name="name" type="text" class="form-control" id="u_name" value="<?=$res[0]['name']?>">
    </div>
    <div class="form-group">
      <label for="desc">User Number:</label>
      <input name="number" type="number" class="form-control" id="u_num" value="<?=$res[0]['number']?>">
    </div>
    <div class="form-group">
      <label for="icone">Group :</label>
      <input name="group_id" type="number" class="form-control" id="g_id" value="<?=$res[0]['group_id']?>">
    </div>
   
    <button name="submit" type="submit" class="btn btn-primary">Update</button>
  </form>

    </div>