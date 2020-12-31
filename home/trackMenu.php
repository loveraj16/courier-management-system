<!-- when track menu is clicked it will show all courier placed by that User-->
<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>
<?php include('header.php'); ?>

<div style="overflow-x:auto;">
<table width='80%' border="1px dash" style="margin-top:30px;margin-left:auto ;margin-right:auto ;font-weight:bold;border-spacing: 5px 5px;border-collapse: collapse;">
    <tr style="background-color: green;font-size:30px">
        <th>No.</th>
        <th>Item's Image</th>
        <th>Sender Name</th>
        <th>Receiver Name</th>
        <th>Receiver Email</th>
        <th>Action</th>
    </tr>

    <?php
    include('../dbconnection.php');

    $email = $_SESSION['emm'];

    $qryy= "SELECT * FROM `courier` WHERE `semail`='$email'";
    $run= mysqli_query($dbcon,$qryy);

    if(mysqli_num_rows($run)<1){
        echo "<tr><td colspan='6'>No record found..</td></tr>";
    }
    else{
        $count=0;
        while($data=mysqli_fetch_assoc($run))
        {
            $count++;
        ?>
        <tr align="center">
            <td><?php echo $count; ?></td>
            <td><img src="../dbimages/<?php echo $data['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
            <td><?php echo $data['sname']; ?></td>
            <td><?php echo $data['rname']; ?></td>
            <td><?php echo $data['remail']; ?></td>
            <td>
                <a href="updationtable.php?sid=<?php echo $data['c_id']; ?>">Edit</a> ||
                <a href="deletecourier.php?bb=<?php echo $data['billno']; ?>">Delete</a>||
                <a href="status.php?sidd=<?php echo $data['c_id']; ?>">CheckStatus</a>
            </td>
        </tr>
        <?php
        }
    }
    ?>
</table>
</div>