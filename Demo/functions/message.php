<?php

if(isset($_SESSION['status']))
{
    ?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['status'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


    <?php
    unset($_SESSION['status']);
}

if(isset($_SESSION['login']))
{
    ?>

<!-- 
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>me!</strong> <?php //echo $_SESSION['login'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->
<!-- <script>alert("Welcome to Geeks for Geeks")</script>; -->
<!-- <div class="w3-panel w3-green">
  <h3>Success!</h3>
  <p>Your action was successful.</p>
</div> -->
<!-- <script>
function myFunction() {
  alert( <?php 
                      //include('../functions/message.php');
        ?>
      );
}
</script> -->



    <?php
    unset($_SESSION['login']);
    
    
}

?>

