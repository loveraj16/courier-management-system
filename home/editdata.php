<!-- php code for updating new info to database, directed from updationtable.php -->

<?php

if(isset($_POST['submit'])){

    include('../dbconnection.php');
    $idd = $_POST['idd'];

    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd = $_POST['saddress'];
    $radd = $_POST['raddress'];
    $wgt = $_POST['wgt'];
    $billn = $_POST['billno'];
    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam,"../dbimages/$imagenam");

    $qry = "UPDATE `courier` SET `sname`='$sname',`rname`='$rname',`semail`='$semail',`remail`='$remail',`sphone`='$sphone',`rphone`='$rphone',`saddress`='$sadd',`raddress`='$radd',`weight`='$wgt',`billno`='$billn',`image`='$imagenam',`date`='$newDate' WHERE `c_id`='$idd'";
    $run = mysqli_query($dbcon,$qry);

    if($run==true){
        ?>  <script>
            alert('Data Updated Successfully :)');
            window.open('home.php','_self');
            </script>
        <?php
    }

}

?>