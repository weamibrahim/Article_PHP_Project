<?php 
 
$handler = new MySQLHandler("groups");

 $id=intval($_GET['group']);
 $res=$handler->get_record_by_id($id);
 if(isset($_POST['submit'])){
 
  $newdata=array("name"=>$_POST['name'] , "icon"=>$_POST['icon'] ,"description"=>$_POST['desc']);
  $handler->connect();
  $handler->update($newdata,$id);
  header("Location: http://localhost/Articles_dashboard/index.php?group");
 }


 
                   ?>
           
<div class="container p-5">

<h4>Edit Group Detail</h4>

<form id="update-Items" enctype='multipart/form-data' action="" method="POST">
	<div class="form-group">
      <input type="text" class="form-control" id="product_id"  hidden>
    </div>
    <div class="form-group">
      <label for="name">Group Name:</label>
      <input name="name" type="text" class="form-control" id="g_name" value="<?=$res[0]['name']?>">
    </div>
    <div class="form-group">
      <label for="desc">Group Description:</label>
      <input name="desc" type="text" class="form-control" id="g_desc" value="<?=$res[0]['description']?>">
    </div>
    <div class="form-group">
      <label for="icone">Group Icon:</label>
      <input name="icon" type="text" class="form-control" id="g_icon" value="<?=$res[0]['icon']?>">
    </div>
   
    <button name="submit" type="submit" class="btn btn-primary">Update</button>
  </form>

    </div>
