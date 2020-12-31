<!-- when we click update any items, it gives table with prev info -->
<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }

?>

<?php
    include('../dbconnection.php');

    $idd= $_GET['sid'];
    $uqry= "SELECT * FROM `courier` WHERE `c_id`='$idd'";
    $run= mysqli_query($dbcon,$uqry);
    $data = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    
</head>
<body>
<form action="editdata.php" method="POST" enctype="multipart/form-data">
<div style="overflow-x:auto;">
    <table border="0px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 5px 15px;">
        <th colspan="4" style="text-align: center;background-color:#00FF00; width: 140px; height: 50px;">Update The Details As Required</th>
        <tr>
            <th colspan="2">SENDER</th><th colspan="2">RECEIVER</th>
        </tr>
        <tr>
            <th colspan="2"></th><th colspan="2"></th>
        </tr>
        <tr>    
            <td>Name:</td><td><input type="text" name="sname" value="<?php echo $data['sname'];?>" required></td>
       
            <td>Name:</td><td><input type="text" name="rname" value="<?php echo $data['rname'];?>" required></td>
        </tr>
        <tr>    
            <td>Email:</td><td><input type="text" name="semail" value="<?php echo $data['semail'];?>" readonly></td>
       
            <td>Email:</td><td><input type="text" name="remail" value="<?php echo $data['remail'];?>" required></td>
        </tr>
        <tr>
            <td>PhoneNo.:</td><td><input type="number" name="sphone" value="<?php echo $data['sphone'];?>" required></td>
        
            <td>PhoneNo.:</td><td><input type="number" name="rphone" value="<?php echo $data['rphone'];?>" required></td>
        </tr>
        <tr>
            <td>Address:</td><td><input type="textfield" name="saddress" value="<?php echo $data['saddress'];?>" required></td>
        
            <td>Address:</td><td><input type="textfield" name="raddress" value="<?php echo $data['raddress'];?>" required></td>
        </tr>
        <tr><td colspan="4">✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️✖️</td></tr>
        <tr>
            <td>Weight:</td><td><input type="number" name="wgt" value="<?php echo $data['weight'];?>" required></td>
       
            <td>ReceiptNo.:</td><td><input type="number" name="billno" value="<?php echo $data['billno'];?>" required></td>
        </tr>
        <tr>
            <td>Date:</td><td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td>
            <td>Items Image:</td><td><input type="file" name="simg" value="<?php echo $data['image'];?>" ></td>
        </tr>
        <tr>
            <input type="hidden" name="idd" value="<?php echo $data['c_id']; ?>" />
            <td colspan="4" align="center"><input type="submit" name="submit" value="Update" style="background-color: orange; border-radius: 15px; width: 140px; height: 50px;cursor:pointer;"></td>
        </tr>
    </table>
</div>   
</form>
</body>
</html>

