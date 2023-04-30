<center>
<?php 
 
 $handler = new MySQLHandler("users");
 
  $id=intval($_GET['id']);
  $res=$handler->get_record_by_id($id);
  if(isset($_POST['submit'])){
   $handler->connect();
   $handler->delete($id);
   header("Location: http://localhost/php-project/index.php?user");
  }
 
 
  
                    ?>
            
 <div class="container p-5 w-25 card" style="color:white">
 
 <h4>Delete User </h4>
 
 <form id="delete-Items" enctype='multipart/form-data' action="" method="POST">
 <p>Are you sure you want to delete this record?</p>
    
     <button name="submit" type="submit" class="btn btn-danger" >Delete</button>
     <a href= "<?php echo $_SERVER['PHP_SELF']."?user"?>"  class="btn btn-success">Cancel</a>
   </form>
 
     </div>
 
</center>