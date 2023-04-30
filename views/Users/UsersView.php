<center>
    <?php
    require_once("vendor/autoload.php");

    $handler = new MySQLHandler("users");

    $result = $handler->get_data(["id","name","email","number","group_id"]);


    if (!$handler->connect())
    {

         die('Could not connect: ');

    }

        echo "<table align=center border=1px style=width:600px; line-height:40px;>";
        echo "<tr> 
        <th colspan=6><h2>Users</h2></th> 
        </tr><tr>";

        foreach($result[0] as $key=>$val){
            echo "<th>".$key."</th>";
        }

    echo "<th>Action</th></thead></tr>";
    

    foreach($result as $row)

    {

        echo "<tr>";

        echo "<td>" . $row['id'] . "</td>";

        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['number'] . "</td>";

        echo "<td>" . $row['group_id'] . "</td>";


        echo  
         "<td>
         <a   href='". $_SERVER["PHP_SELF"]. "?user=". $row["id"]." '> Edit </a><br>
         <a  href=" . $_SERVER["PHP_SELF"] ."?user=delete&" ."id=".  $row["id"]  ." name='delete' type='submit'
         
         > Delete </a>  
        
         </td> ";

        echo "</tr>";

    }

        echo "</table>";
    ?>

    <?php
        echo
 
        "<a  href=" . $_SERVER["PHP_SELF"] ."?user=add&" ."id=" . $row["id"] ." name='add' type='button' class='btn btn-secondary'>Add User</a>"

    ?>
   
    


    </center>