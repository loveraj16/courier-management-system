<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body bgcolor="#067d64">
    <h5><a href="../index.php" style="float: right; margin-right:50px; color:#00BCD4">BackToHome</a></h5><br>
    <h1 align='center' style="color: #00BCD4;font-size:60px">Admin Login</h1>
    <h6 align='center' style="color: #212121;font-weight: bold;font-size:15px">Swagat Nahi Karoge Hamara..</h6>
    <form action="adminlogin.php" method="POST" style="margin: auto;">
        <table align="center">
            <tr>
                <td>Email_ID:</td>
                <td><input type="email" name="uname" require></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" require></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" style="cursor: pointer;"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>