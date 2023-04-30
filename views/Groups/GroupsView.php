<center>
    
<?php
require_once("vendor/autoload.php");
$handler = new MySQLHandler("groups");
$result = $handler->get_data(["id","name","icon","description"]);

if (!$handler->connect())

  {

  die('Could not connect: ');

  }


echo "<table align=center border=1px style=width:600px; line-height:40px;>";
echo "<tr> 
<th colspan=6><h2>Groups Record</h2></th> 
</tr><tr>";
foreach( $result[0] as $key=>$val){
   
    

echo "<th>".$key."</th>";



}

echo "<th>Action</th></thead></tr>";
 

foreach($result as $row)

  {

  echo "<tr>";

  echo "<td>" . $row['id'] . "</td>";

  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['icon'] . "</td>";

  echo "<td>" . $row['description'] . "</td>";

  echo   "<td>
  <a href='" . $_SERVER["PHP_SELF"] . "?group=" . $row["id"] . "'> Edit </a>
  
  <a  href=" . $_SERVER["PHP_SELF"] ."?group=delete&" ."id=" . $row["id"] ." name='delete' type='submit'> Delete </a>
  
  </td> ";
    
  echo "</tr>";

  }

echo "</table>";
$handler->connect();



?>



  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Group
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">Group Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Icone:</label>
              <input type="number" class="form-control" id="p_price" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add group</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</center>


<!-- echo   "<td>
  
  <button type=button class= btn btn-primary btn-sm p-1 mr-2  data-toggle=modal data-target=#myeditModal>
    Edit
  </button>

 
  <div class=modal fade id=myeditModal role=dialog>
    <div class=modal-dialog>
    
      <div class=modal-content>
        <div class=modal-header>
          <h4 class=modal-title>Edit Group</h4>
          <button type=button class=close data-dismiss=modal>&times;</button>
        </div>
        <div class=modal-body>
          <form  enctype='multipart/form-data' onsubmit=addItems() method=POST>
            <div class=form-group>
              <label for=name>Group Name:</label>
              <input type=text class=form-control id=p_name required>
            </div>
            <div class=form-group>
              <label for=price>Icone:</label>
              <input type=number class=form-control id=p_price required>
            </div>
            <div class=form-group>
              <label for=qty>Description:</label>
              <input type=text class=form-control id=p_desc required>
            </div>
            <div class=form-group>
              <button type=submit class=btn btn-secondary id=upload style=height:40px>Edit group</button>
            </div>
          </form>

        </div>
        <div class=modal-footer>
          <button type=button class=btn btn-default data-dismiss=modal style=height:40px>Close</button>
        </div>
      </div>
      
    </div>
  </div> -->
