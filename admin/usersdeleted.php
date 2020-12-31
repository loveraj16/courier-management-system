<!-- this page will delete user & there courier when deleteUser link clicked in deleteusers.php by admin -->

<?php
    include('../dbconnection.php');
    $em= $_GET['emm'];

    // $qrycr="DELETE FROM `courier` WHERE `semail`='$em'";
    // $runcr = mysqli_query($dbcon,$qrycr);
    // if($runcr==false){
    //     echo '';
    // }

    $qry = "DELETE FROM `users` WHERE `email`='$em'";
    $run = mysqli_query($dbcon,$qry);

    if($run==true){
    ?>  <script>
        alert('User Removed Successfully :)');
        window.open('deleteusers.php','_self');
        </script>
    <?php
}

?>