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
