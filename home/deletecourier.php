<!-- user will delete there courier themself when click delete link in track section-->
<?php
    include('../dbconnection.php');
    $billno= $_REQUEST['bb'];

    $qry = "DELETE FROM `courier` WHERE `billno`='$billno'";
    $run = mysqli_query($dbcon,$qry);

    if($run==true){
    ?>  <script>
        alert('Courier Deleted Successfully :)');
        window.open('trackMenu.php','_self');
                
        </script>
    <?php
}
?>