<center>
<?php 
 
 $handler = new MySQLHandler("articles");
 
  $id=intval($_GET['id']);
  $res=$handler->get_record_by_id($id);
  if(isset($_POST['submit'])){
   $handler->connect();
   $handler->delete($id);
   header("Location: http://localhost/Articles_dashboard/index.php?article");
  }
   ?>
            
 <div class="container p-5 w-25 card" style="color:white">
 
 <h4>Delete Article </h4>
 
 <form id="delete-Items" enctype='multipart/form-data' action="" method="POST">
 <p>Are you sure you want to delete this record?</p>
    
     <button name="submit" type="submit" class="btn btn-danger" >Delete</button>
     <a href= "<?php echo $_SERVER['PHP_SELF']."?article"?>"  class="btn btn-success">Cancel</a>
   </form>
 
     </div>
 
</center>