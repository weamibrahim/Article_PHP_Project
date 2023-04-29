<?php
if(isset($_SESSION['status']))
{
    ?>
    <!-- <div class="alter alter-warning alter-dismissible fade show" role="alter">
        <strong>Hey!</strong> 
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->

    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['status'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- <script>
        swal({
title: "rgr",
text: "You clicked the button!",
icon: "success",
});

     </script> -->



    <?php
    unset($_SESSION['status']);
    //unset($_SESSION['login']);
}

?>