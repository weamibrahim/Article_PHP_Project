<html>
    <head>
    <script src="../../assets/dist/js/sweetalert.min.js"></script>
    </head>
</html>

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
?>

<?php
if(isset($_SESSION['login']))
{
    ?>


<?php
echo $_SESSION['login'];
?>

    <?php
    unset($_SESSION['login']);
    
    
}

?>



<?php

if(isset($_SESSION['delete']))
{
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['delete'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


    <?php
    unset($_SESSION['delete']);
}
?>




<?php

if(isset($_SESSION['warn']))
{
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['warn'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


    <?php
    unset($_SESSION['warn']);
}
?>




<?php

if(isset($_SESSION['error']))
{
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['error'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


    <?php
    unset($_SESSION['error']);
}
?>



